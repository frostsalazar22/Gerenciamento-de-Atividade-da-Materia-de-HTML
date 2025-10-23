import 'package:shared_preferences/shared_preferences.dart';

class PreferencesService {
  static const String _currencyKey = "currency";
  static const String _limitKey = "daily_limit";

  Future<void> setCurrency(String currency) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(_currencyKey, currency);
  }

  Future<String?> getCurrency() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(_currencyKey);
  }

  Future<void> setDailyLimit(double limit) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setDouble(_limitKey, limit);
  }

  Future<double?> getDailyLimit() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getDouble(_limitKey);
  }
}
