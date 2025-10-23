import 'dart:convert';
import 'dart:io' show File;
import 'package:flutter/foundation.dart' show kIsWeb;
import 'package:path_provider/path_provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/expense.dart';

class JsonStorageService {
  static const _prefsKey = "expenses_json";
  static const _fileName = "expenses.json";

  /// Carrega despesas do JSON (SharedPreferences no Web, arquivo no mobile/desktop).
  Future<List<Expense>> loadExpenses() async {
    try {
      if (kIsWeb) {
        final prefs = await SharedPreferences.getInstance();
        final jsonString = prefs.getString(_prefsKey);
        if (jsonString == null || jsonString.isEmpty) return [];
        final List data = json.decode(jsonString);
        return data.map((e) => Expense.fromMap(e)).toList();
      } else {
        final dir = await getApplicationDocumentsDirectory();
        final file = File("${dir.path}/$_fileName");

        if (!await file.exists()) {
          await file.writeAsString("[]"); // cria arquivo vazio
          return [];
        }

        final jsonString = await file.readAsString();
        if (jsonString.isEmpty) return [];

        final List data = json.decode(jsonString);
        return data.map((e) => Expense.fromMap(e)).toList();
      }
    } catch (e) {
      // fallback em caso de erro
      return [];
    }
  }

  /// Salva lista de despesas no JSON.
  Future<void> saveExpenses(List<Expense> expenses) async {
    try {
      final data = expenses.map((e) => e.toMap()).toList();
      final jsonString = json.encode(data);

      if (kIsWeb) {
        final prefs = await SharedPreferences.getInstance();
        await prefs.setString(_prefsKey, jsonString);
      } else {
        final dir = await getApplicationDocumentsDirectory();
        final file = File("${dir.path}/$_fileName");
        await file.writeAsString(jsonString, flush: true);
      }
    } catch (e) {
      // se der erro, simplesmente ignora para não travar o app
    }
  }
}
