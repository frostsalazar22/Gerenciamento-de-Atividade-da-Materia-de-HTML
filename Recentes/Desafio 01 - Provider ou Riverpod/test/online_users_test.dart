import 'package:flutter_test/flutter_test.dart';
import 'package:meu_app_flutter/models/user.dart';
import 'package:meu_app_flutter/viewmodels/online_users_notifier.dart';

void main() {
  group('OnlineUsersStateNotifier', () {
    test('Deve alternar o status de um usuário', () {
      final notifier = OnlineUsersStateNotifier();

      final initialStatus = notifier.state.first.isOnline;
      final userId = notifier.state.first.id;

      notifier.toggleStatus(userId);

      expect(notifier.state.first.isOnline, !initialStatus);
    });

    test('Deve filtrar usuários pelo nome', () {
      final notifier = OnlineUsersStateNotifier();

      const search = "ali";
      final filtered = notifier.state
          .where((u) => u.name.toLowerCase().contains(search.toLowerCase()))
          .toList();

      expect(filtered.length, 1);
      expect(filtered.first.name, "Alice");
    });
  });
}
