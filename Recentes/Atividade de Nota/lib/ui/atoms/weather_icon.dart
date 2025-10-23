import 'package:flutter/material.dart';

class WeatherIcon extends StatelessWidget {
  final IconData icon;
  final double size;

  const WeatherIcon({super.key, required this.icon, this.size = 64});

  @override
  Widget build(BuildContext context) {
    return Icon(icon, size: size, color: Colors.orangeAccent);
  }
}
