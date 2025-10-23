import 'package:flutter/material.dart';
import '../atoms/city_text.dart';

class CityHeader extends StatelessWidget {
  final String city;

  const CityHeader({super.key, required this.city});

  @override
  Widget build(BuildContext context) {
    return Center(child: CityText(city: city));
  }
}
