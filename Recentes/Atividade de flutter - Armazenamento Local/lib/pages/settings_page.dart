import 'package:flutter/material.dart';
import '../services/preferences_service.dart';

class SettingsPage extends StatefulWidget {
  const SettingsPage({super.key});

  @override
  State<SettingsPage> createState() => _SettingsPageState();
}

class _SettingsPageState extends State<SettingsPage> {
  final prefs = PreferencesService();

  String selectedCurrency = "R\$";
  double dailyLimit = 0;
  bool changed = false;

  final _limitController = TextEditingController();

  @override
  void initState() {
    super.initState();
    _loadPreferences();
  }

  @override
  void dispose() {
    _limitController.dispose();
    super.dispose();
  }

  Future<void> _loadPreferences() async {
    final currency = await prefs.getCurrency();
    final limit = await prefs.getDailyLimit();

    if (!mounted) return;
    setState(() {
      selectedCurrency = currency ?? "R\$";
      dailyLimit = limit ?? 0;
      _limitController.text = dailyLimit.toStringAsFixed(2);
    });
  }

  Future<void> _savePreferences() async {
    final parsedLimit = double.tryParse(
          _limitController.text.trim().replaceAll(',', '.'),
        ) ??
        0;

    await prefs.setCurrency(selectedCurrency);
    await prefs.setDailyLimit(parsedLimit);

    if (!mounted) return;
    changed = true;

    ScaffoldMessenger.of(context).showSnackBar(
      const SnackBar(content: Text("Configurações salvas com sucesso!")),
    );

    Navigator.pop(context, true); // retorna para Home avisando que mudou
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: () async {
        Navigator.pop(context, changed); // volta informando se houve alteração
        return false;
      },
      child: Scaffold(
        appBar: AppBar(title: const Text("Configurações")),
        body: Padding(
          padding: const EdgeInsets.all(16),
          child: Column(
            children: [
              DropdownButton<String>(
                value: selectedCurrency,
                isExpanded: true,
                items: ["R\$", "\$", "€"].map((c) {
                  return DropdownMenuItem(
                    value: c,
                    child: Text(c),
                  );
                }).toList(),
                onChanged: (val) {
                  if (val != null) {
                    setState(() {
                      selectedCurrency = val;
                      changed = true;
                    });
                  }
                },
              ),
              TextField(
                controller: _limitController,
                decoration: const InputDecoration(labelText: "Limite Diário"),
                keyboardType: TextInputType.number,
                onChanged: (_) => changed = true,
              ),
              const SizedBox(height: 20),
              SizedBox(
                width: double.infinity,
                child: ElevatedButton(
                  onPressed: _savePreferences,
                  child: const Text("Salvar"),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
