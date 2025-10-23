import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../models/user.dart';

// ========================= PROVIDER =========================
class OnlineUsersNotifier extends ChangeNotifier {
  final List<User> _users = [
    User(id: '1', name: 'Alice', isOnline: true),
    User(id: '2', name: 'Bob'),
    User(id: '3', name: 'Charlie', isOnline: true),
    User(id: '4', name: 'Diana'),
  ];

  List<User> get users => _users;

  void toggleStatus(String userId) {
    final user = _users.firstWhere((user) => user.id == userId);
    user.isOnline = !user.isOnline;
    notifyListeners();
  }
}

final onlineUsersProvider =
    ChangeNotifierProvider((ref) => OnlineUsersNotifier());

// ========================= RIVERPOD =========================
class OnlineUsersStateNotifier extends StateNotifier<List<User>> {
  OnlineUsersStateNotifier()
      : super([
          User(id: '1', name: 'Alice', isOnline: true),
          User(id: '2', name: 'Bob'),
          User(id: '3', name: 'Charlie', isOnline: true),
          User(id: '4', name: 'Diana'),
        ]);

  void toggleStatus(String userId) {
    final newUsers = [...state];
    final userIndex = newUsers.indexWhere((user) => user.id == userId);
    newUsers[userIndex].isOnline = !newUsers[userIndex].isOnline;
    state = newUsers;
  }
}

final onlineUsersNotifierProvider =
    StateNotifierProvider<OnlineUsersStateNotifier, List<User>>(
  (ref) => OnlineUsersStateNotifier(),
);
