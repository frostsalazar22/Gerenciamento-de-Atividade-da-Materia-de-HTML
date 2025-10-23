import 'package:flutter/material.dart';
import '../models/expense.dart';
import '../services/json_storage_service.dart';
import '../services/preferences_service.dart';
import 'expenses_page.dart';
import 'settings_page.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final jsonService = JsonStorageService();
  final prefs = PreferencesService();

  List<Expense> recent = [];
  String currency = "R\$";
  double dailyLimit = 0;

  @override
  void initState() {
    super.initState();
    _refreshAll();
  }

  Future<void> _refreshAll() async {
    await Future.wait([_loadExpenses(), _loadPreferences()]);
  }

  Future<void> _loadExpenses() async {
    final data = await jsonService.loadExpenses();
    if (!mounted) return;
    setState(() => recent = data.reversed.take(5).toList());
  }

  Future<void> _loadPreferences() async {
    final c = await prefs.getCurrency();
    final l = await prefs.getDailyLimit();
    if (!mounted) return;
    setState(() {
      currency = c ?? "R\$";
      dailyLimit = l ?? 0;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Orçamento de Viagem")),
      body: RefreshIndicator(
        onRefresh: _refreshAll,
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: [
            Row(
              children: [
                Expanded(
                  child: ElevatedButton(
                    onPressed: () async {
                      await Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => const SettingsPage()),
                      );
                      await _loadPreferences();
                      if (!mounted) return;
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(content: Text("Configurações aplicadas.")),
                      );
                    },
                    child: const Text("Configurações"),
                  ),
                ),
                const SizedBox(width: 12),
                Expanded(
                  child: ElevatedButton(
                    onPressed: () async {
                      final updated = await Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => const ExpensesPage()),
                      );
                      if (updated == true) {
                        await _loadExpenses();
                      }
                    },
                    child: const Text("Gerenciar Despesas"),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 16),
            Card(
              elevation: 2,
              child: Padding(
                padding: const EdgeInsets.all(12),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text("Últimas despesas", style: Theme.of(context).textTheme.titleMedium),
                    const SizedBox(height: 8),
                    if (recent.isEmpty)
                      const Text("Nenhuma despesa cadastrada")
                    else
                      ...recent.map((e) => ListTile(
                            dense: true,
                            contentPadding: EdgeInsets.zero,
                            title: Text(e.description),
                            subtitle: Text("$currency ${e.value.toStringAsFixed(2)}"),
                          )),
                  ],
                ),
              ),
            ),
            if (dailyLimit > 0) ...[
              const SizedBox(height: 12),
              Text(
                "Limite por despesa: $currency ${dailyLimit.toStringAsFixed(2)}",
                style: const TextStyle(fontSize: 12),
              ),
            ],
          ],
        ),
      ),
    );
  }
}
