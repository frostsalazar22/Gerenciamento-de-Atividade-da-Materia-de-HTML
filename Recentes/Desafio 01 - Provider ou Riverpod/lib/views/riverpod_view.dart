import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../viewmodels/online_users_notifier.dart';
import '../viewmodels/search_notifier.dart';
import 'widgets/user_tile.dart';

class RiverpodView extends ConsumerWidget {
  const RiverpodView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final users = ref.watch(onlineUsersNotifierProvider);
    final search = ref.watch(searchProvider);

    final filteredUsers = users
        .where((u) => u.name.toLowerCase().contains(search.toLowerCase()))
        .toList();

    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        const Text(
          'Lista de Usuários (Riverpod)',
          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
        ),
        const SizedBox(height: 10),
        TextField(
          decoration: const InputDecoration(
            labelText: "Buscar usuário...",
            border: OutlineInputBorder(),
          ),
          onChanged: (value) =>
              ref.read(searchProvider.notifier).state = value,
        ),
        const SizedBox(height: 10),
        Expanded(
          child: ListView.builder(
            itemCount: filteredUsers.length,
            itemBuilder: (context, index) {
              final user = filteredUsers[index];
              return UserTile(
                user: user,
                onTap: () => ref
                    .read(onlineUsersNotifierProvider.notifier)
                    .toggleStatus(user.id),
              );
            },
          ),
        ),
      ],
    );
  }
}
