import 'package:flutter/material.dart';
import 'riverpod_view.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Simulador de Status Online'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: RiverpodView(),
      ),
    );
  }
}
