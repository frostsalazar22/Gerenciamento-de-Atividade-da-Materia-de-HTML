import 'package:flutter/material.dart';

class TemperatureText extends StatelessWidget {
  final String temperature;

  const TemperatureText({super.key, required this.temperature});

  @override
  Widget build(BuildContext context) {
    return Text(
      temperature,
      style: const TextStyle(fontSize: 42, fontWeight: FontWeight.bold),
    );
  }
}
