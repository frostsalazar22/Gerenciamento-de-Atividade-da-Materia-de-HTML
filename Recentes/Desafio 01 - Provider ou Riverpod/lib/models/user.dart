class User {
  final String id;
  final String name;
  bool isOnline;

  User({
    required this.id,
    required this.name,
    this.isOnline = false,
  });
}
