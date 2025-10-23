import 'package:flutter/material.dart';
import '../organisms/weather_card.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  bool _visible = false;

  final List<Map<String, dynamic>> _cities = [
    {'city': 'São Paulo', 'temperature': '28°C', 'icon': Icons.wb_sunny},
    {'city': 'Rio de Janeiro', 'temperature': '32°C', 'icon': Icons.beach_access},
    {'city': 'Guarapuava', 'temperature': '8001°C', 'icon': Icons.beach_access},
  ];

  @override
  void initState() {
    super.initState();
    Future.delayed(const Duration(milliseconds: 500), () {
      setState(() {
        _visible = true;
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Tempo de M*rda')),
      body: AnimatedOpacity(
        opacity: _visible ? 1.0 : 0.0,
        duration: const Duration(seconds: 1),
        child: ListView.builder(
          padding: const EdgeInsets.all(16),
          itemCount: _cities.length,
          itemBuilder: (context, index) {
            final city = _cities[index];
            return WeatherCard(
              city: city['city'],
              temperature: city['temperature'],
              icon: city['icon'],
            );
          },
        ),
      ),
    );
  }
}
