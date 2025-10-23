import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Inputs e Interatividade',
      theme: ThemeData(
        primarySwatch: Colors.deepPurple,
      ),
      home: const FormularioPage(),
      debugShowCheckedModeBanner: false,
    );
  }
}

class FormularioPage extends StatefulWidget {
  const FormularioPage({super.key});

  @override
  State<FormularioPage> createState() => _FormularioPageState();
}

class _FormularioPageState extends State<FormularioPage> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  final TextEditingController _nomeController = TextEditingController();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _senhaController = TextEditingController();

  String _toqueMensagem = "Nenhum toque detectado";
  bool _senhaOculta = true;

  @override
  void dispose() {
    _nomeController.dispose();
    _emailController.dispose();
    _senhaController.dispose();
    super.dispose();
  }

  void _enviarFormulario() {
    if (_formKey.currentState!.validate()) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(
            'Formulário Válido \nNome: ${_nomeController.text}, Email: ${_emailController.text}',
          ),
          backgroundColor: Colors.green,
        ),
      );
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text('Por favor, corrija os erros no formulário'),
          backgroundColor: Colors.red,
        ),
      );
    }
  }

  // Função para alternar a visibilidade da senha
  void _alternarVisibilidadeSenha() {
    setState(() {
      _senhaOculta = !_senhaOculta;
    });
  }

  // Função para detectar toques na tela
  void _onTapDetected() {
    setState(() {
      _toqueMensagem = "Toque detectado!";
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Entrada de Dados e Interatividade', style: TextStyle(color: Colors.white)),
        backgroundColor: Colors.deepPurple,
      ),
      body: GestureDetector(
        onTap: _onTapDetected, // Detecta toques na tela
        child: SingleChildScrollView(
          padding: EdgeInsets.all(20),
          child: Form(
            key: _formKey,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: <Widget>[
                const Text(
                  'Cadastre-se',
                  style: TextStyle(
                    fontSize: 24,
                    fontWeight: FontWeight.bold,
                    color: Colors.deepPurple,
                  ),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 25),
                // Campos
                TextField(
                  controller: _nomeController,
                  decoration: InputDecoration(
                    labelText: 'Nome Completo',
                    hintText: 'Ex: Tales Ribeiro',
                    border: OutlineInputBorder(),
                    prefixIcon: Icon(Icons.person),
                  ),
                ),
                const SizedBox(height: 25),
                TextFormField(
                  controller: _emailController,
                  keyboardType: TextInputType.emailAddress,
                  decoration: InputDecoration(
                    labelText: 'Email',
                    hintText: 'seu.email@exemplo.com',
                    border: OutlineInputBorder(),
                    prefixIcon: Icon(Icons.email),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'O email é obrigatório.';
                    }
                    if (!value.contains('@') || !value.contains('.')) {
                      return 'Digite um email válido.';
                    }
                    return null;
                  },
                ),
                const SizedBox(height: 25),
                TextFormField(
                  controller: _senhaController,
                  obscureText: _senhaOculta,
                  decoration: InputDecoration(
                    labelText: 'Senha',
                    hintText: 'Mínimo 6 caracteres',
                    border: OutlineInputBorder(),
                    prefixIcon: Icon(Icons.lock),
                    suffixIcon: IconButton(
                      icon: Icon(
                        _senhaOculta ? Icons.visibility_off : Icons.visibility,
                      ),
                      onPressed: _alternarVisibilidadeSenha,
                    ),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'A senha é obrigatória.';
                    }
                    if (value.length < 6) {
                      return 'A senha deve ter pelo menos 6 caracteres.';
                    }
                    return null;
                  },
                ),
                const SizedBox(height: 25),
                ElevatedButton.icon(
                  onPressed: _enviarFormulario,
                  icon: Icon(Icons.send),
                  label: Text('Enviar Cadastro'),
                ),
                const SizedBox(height: 20),
                Text(
                  _toqueMensagem,
                  textAlign: TextAlign.center,
                  style: TextStyle(fontSize: 18, color: Colors.blue),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
