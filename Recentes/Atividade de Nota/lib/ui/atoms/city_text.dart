import 'package:flutter/material.dart';

class CityText extends StatelessWidget {
  final String city;

  const CityText({super.key, required this.city});

  @override
  Widget build(BuildContext context) {
    return Text(
      city,
      style: const TextStyle(fontSize: 24, color: Colors.black54),
    );
  }
}
