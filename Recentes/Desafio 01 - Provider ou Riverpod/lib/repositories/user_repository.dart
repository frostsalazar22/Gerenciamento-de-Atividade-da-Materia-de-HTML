// Simula uma camada de repositório (poderia vir de API ou banco de dados).
import '../models/user.dart';

class UserRepository {
  List<User> fetchUsers() {
    return [
      User(id: '1', name: 'Alice', isOnline: true),
      User(id: '2', name: 'Bob'),
      User(id: '3', name: 'Charlie', isOnline: true),
      User(id: '4', name: 'Diana'),
    ];
  }
}
