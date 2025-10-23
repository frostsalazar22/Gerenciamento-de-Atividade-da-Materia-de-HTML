import 'package:flutter/material.dart';
import '../models/expense.dart';
import '../services/json_storage_service.dart';
import '../services/preferences_service.dart';

class ExpensesPage extends StatefulWidget {
  const ExpensesPage({super.key});

  @override
  State<ExpensesPage> createState() => _ExpensesPageState();
}

class _ExpensesPageState extends State<ExpensesPage> {
  final jsonService = JsonStorageService();
  final prefs = PreferencesService();

  final _descController = TextEditingController();
  final _valueController = TextEditingController();

  List<Expense> expenses = [];
  double dailyLimit = 0;
  bool isSaving = false;
  bool changed = false; // controla se houve alteração

  @override
  void initState() {
    super.initState();
    _loadPreferences();
    _loadExpenses();
  }

  @override
  void dispose() {
    _descController.dispose();
    _valueController.dispose();
    super.dispose();
  }

  Future<void> _loadPreferences() async {
    final limit = await prefs.getDailyLimit();
    if (!mounted) return;
    setState(() => dailyLimit = limit ?? 0);
  }

  Future<void> _loadExpenses() async {
    final data = await jsonService.loadExpenses();
    if (!mounted) return;
    setState(() => expenses = data);
  }

  String? _validateInputs() {
    final desc = _descController.text.trim();
    if (desc.isEmpty) return "Informe a descrição.";

    final raw = _valueController.text.trim().replaceAll(',', '.');
    final parsed = double.tryParse(raw);
    if (parsed == null) return "Valor inválido. Use ponto ou vírgula.";
    if (parsed <= 0) return "Valor deve ser maior que zero.";
    if (dailyLimit > 0 && parsed > dailyLimit) {
      return "O valor não pode exceder o limite de ${dailyLimit.toStringAsFixed(2)}.";
    }
    return null;
  }

  Future<void> _saveExpense() async {
    final error = _validateInputs();
    if (error != null) {
      _showSnack(error);
      return;
    }

    final value = double.parse(_valueController.text.trim().replaceAll(',', '.'));
    final expense = Expense(
      description: _descController.text.trim(),
      value: value,
      date: DateTime.now().toIso8601String(),
    );

    try {
      setState(() => isSaving = true);

      expenses.add(expense);
      await jsonService.saveExpenses(expenses);

      changed = true; // marca que houve alteração
      _descController.clear();
      _valueController.clear();
      _showSnack("Despesa salva com sucesso.");
      setState(() {});
    } catch (e) {
      _showSnack("Falha ao salvar: $e");
    } finally {
      if (mounted) setState(() => isSaving = false);
    }
  }

  Future<void> _deleteExpense(int index) async {
    expenses.removeAt(index);
    await jsonService.saveExpenses(expenses);
    changed = true;
    setState(() {});
    _showSnack("Despesa removida.");
  }

  void _showSnack(String msg) {
    ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text(msg)));
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: () async {
        Navigator.pop(context, changed); // retorna se houve alteração
        return false;
      },
      child: Scaffold(
        appBar: AppBar(title: const Text("Despesas")),
        body: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(12),
              child: Column(
                children: [
                  TextField(
                    controller: _descController,
                    decoration: const InputDecoration(labelText: "Descrição"),
                    textInputAction: TextInputAction.next,
                  ),
                  TextField(
                    controller: _valueController,
                    decoration: const InputDecoration(labelText: "Valor"),
                    keyboardType: TextInputType.number,
                    onSubmitted: (_) => _saveExpense(),
                  ),
                  const SizedBox(height: 10),
                  SizedBox(
                    width: double.infinity,
                    child: ElevatedButton(
                      onPressed: isSaving ? null : _saveExpense,
                      child: Text(isSaving ? "Salvando..." : "Salvar despesa"),
                    ),
                  ),
                  if (dailyLimit > 0)
                    Padding(
                      padding: const EdgeInsets.only(top: 6),
                      child: Text(
                        "Limite por despesa: ${dailyLimit.toStringAsFixed(2)}",
                        style: const TextStyle(fontSize: 12),
                      ),
                    ),
                ],
              ),
            ),
            const Divider(height: 1),
            Expanded(
              child: expenses.isEmpty
                  ? const Center(child: Text("Nenhuma despesa cadastrada"))
                  : ListView.builder(
                      itemCount: expenses.length,
                      itemBuilder: (context, index) {
                        final exp = expenses[index];
                        return ListTile(
                          title: Text(exp.description),
                          subtitle: Text("R\$ ${exp.value.toStringAsFixed(2)}"),
                          trailing: IconButton(
                            icon: const Icon(Icons.delete),
                            onPressed: () => _deleteExpense(index),
                          ),
                        );
                      },
                    ),
            ),
          ],
        ),
      ),
    );
  }
}
