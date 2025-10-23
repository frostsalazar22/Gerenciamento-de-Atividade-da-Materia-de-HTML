class Expense {
  final int? id;
  final String description;
  final double value;
  final String date;

  Expense({this.id, required this.description, required this.value, required this.date});

  Map<String, dynamic> toMap() {
    return {
      'id': id,
      'description': description,
      'value': value,
      'date': date,
    };
  }

  factory Expense.fromMap(Map<String, dynamic> map) {
    return Expense(
      id: map['id'],
      description: map['description'],
      value: (map['value'] as num).toDouble(),
      date: map['date'],
    );
  }
}
