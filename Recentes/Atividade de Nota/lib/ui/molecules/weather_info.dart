import 'package:flutter/material.dart';
import '../atoms/weather_icon.dart';
import '../atoms/temperature_text.dart';

class WeatherInfo extends StatelessWidget {
  final IconData icon;
  final String temperature;

  const WeatherInfo({super.key, required this.icon, required this.temperature});

  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        WeatherIcon(icon: icon),
        const SizedBox(width: 10),
        TemperatureText(temperature: temperature),
      ],
    );
  }
}
