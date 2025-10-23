# Atividade-de-flutter---Armazenamento-Local

# Descriçao do que foi Solicitado
"App de Controle de Gasto Pessoal (Orçamento de Viagem)"

Objetivo: Desenvolver, em duplas, um protótipo de aplicativo mobile em Flutter que auxilie
no controle de gastos de uma viagem. A aplicação deve ser robusta, funcional e,
principalmente, permitir o uso mesmo sem conexão com a internet, aplicando os
conceitos de Shared Preferences e SQLite.
Contexto e Desafio: Você e sua dupla foram contratados para criar a versão offline-first de
um aplicativo de controle de gastos de viagem. O cliente exige que a aplicação tenha dois
recursos principais:
1. Preferências do Usuário: O aplicativo deve permitir que o usuário defina uma
moeda padrão para a viagem (ex: R$, € ou $) e um limite diário de gastos. Essas
preferências devem ser salvas localmente e persistir após o aplicativo ser fechado.
2. Gerenciamento de Despesas: O usuário deve poder registrar despesas (valor,
descrição e data). Todas as despesas devem ser armazenadas localmente para que
possam ser acessadas a qualquer momento.
O maior desafio é preparar a arquitetura do aplicativo para uma futura funcionalidade de
sincronização. O cliente pede que vocês simulem um cenário de conflito de dados: o que
aconteceria se o usuário editasse uma despesa (ex: um almoço de R25paraR50)
offline, mas essa mesma despesa fosse excluída por ele em outro dispositivo online
(simulando a sincronização da nuvem) antes que o app local pudesse se conectar?

Instruções (Duração: 1h30min)
1. Configuração Inicial (~15min):
o Crie um novo projeto Flutter.
o Adicione as dependências necessárias para shared_preferences e sqflite
ao arquivo pubspec.yaml.

2. Configurações com Shared Preferences (~30min):
o Crie uma tela de configurações onde o usuário possa escolher a moeda e
um valor limite diário.
o Use Shared Preferences para salvar as escolhas.
o Na inicialização do aplicativo, carregue os valores salvos para definir o
comportamento da interface.
o Dica: Usem a IA para buscar exemplos de como salvar e carregar diferentes
tipos de dados (String para a moeda, Double para o limite) no Flutter.

3. Gerenciamento de Despesas com SQLite (~30min):
o Crie um modelo de dados para a despesa (Expense) com campos como id,
description, value e date.
o Implemente um banco de dados local usando sqflite.

o Crie métodos para:
▪ Adicionar uma nova despesa.
▪ Listar todas as despesas.
o Exiba a lista de despesas em uma tela usando ListView.builder.
4. Desafio de Conflito de Dados (~15min):
o Não é necessário programar a sincronização.
o Em um arquivo de texto (desafio.txt) ou nos comentários do seu código,
descreva a estratégia que sua dupla adotaria para resolver o conflito de
dados mencionado no contexto (despesa editada offline versus despesa
excluída online).
o Explique por que essa estratégia foi a escolhida, mencionando os prós e
contras dela para a experiência do usuário.

o Dica: Usem a IA para pesquisar por "estratégias de sincronização offline-
first" ou "resolução de conflitos de dados". A partir daí, a análise e a decisão

são de vocês.