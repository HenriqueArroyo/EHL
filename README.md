<h1># Semana 1: Planejamento e Pesquisa</h1>

<h3>**Objetivo:**</h3>
Identificar um problema e definir os requisitos do projeto.

<h3>**Equipe:**</h3>
- Henrique Arroyo: Design, Levantamento de Requisitos 
- Eduardo Ananias: Design, Levantamento de Requisitos 
- Leonardo Lira: Design, Levantamento de Requisitos

---

<h2>### 1. Identificação do Problema</h2>
A **EHL SANEAMENTO**, uma empresa de saneamento, enfrenta um problema crítico na gestão de seu estoque de equipamentos em um galpão específico. A dificuldade em controlar a retirada de equipamentos pelos funcionários gera falta de visibilidade e organização sobre o uso dos itens armazenados, causando os seguintes problemas:

<h3>- **Perda de Equipamentos:**</h3>
Sem um registro eficaz, equipamentos podem ser retirados sem controle, sendo eventualmente perdidos ou danificados sem conhecimento da empresa.
<h3>- **Baixa Eficiência Operacional:** </h3>
A ausência de um sistema de documentação de movimentações faz com que gestores e funcionários percam tempo tentando localizar equipamentos ou confirmar retiradas e devoluções.
<h3>- **Impacto nos Processos de Saneamento:** </h3>
A falta de controle sobre os equipamentos pode atrasar a execução dos processos de manutenção e operação, gerando custos adicionais para reposição.

<h2>### 2. Definição do Problema</h2>
O problema identificado é a deficiência na rastreabilidade e no controle de retirada de equipamentos do estoque, o que dificulta a gestão eficiente e precisa do inventário do galpão. Essa falta de controle impacta negativamente na segurança e responsabilidade sobre os ativos, além de comprometer a transparência e responsabilidade dos funcionários envolvidos.

<h2>### 3. Descrição da Solução</h2>
Propõe-se o desenvolvimento de um sistema informatizado para gerenciar o fluxo de equipamentos do galpão, onde cada retirada, devolução e movimentação seja registrada de forma organizada e acessível. As principais funcionalidades incluem:

<h3>- **Registro Detalhado de Retiradas e Devoluções:**</h3>
Registro de data, hora, funcionário responsável, equipamento e área solicitante.
<h3>**Painel de Visibilidade para Gestores:**</h3>
Relatórios e registros de retiradas acessíveis para monitoramento de status dos equipamentos.
<h3>**Permissões e Acessos:** </h3>
Diferentes níveis de acesso para assegurar que apenas gestores possam visualizar o histórico completo de movimentações.
<h3>**Relatórios e Alertas Automatizados:**</h3>
Relatórios sobre o inventário do galpão e alertas sobre equipamentos não devolvidos.
<h3>**Integração de Dados em Tempo Real:** </h3>
Inventário atualizado automaticamente para refletir retiradas e devoluções, evitando a necessidade de contagens manuais.

Esse sistema proporcionará maior controle sobre os equipamentos da EHL SANEAMENTO, permitindo decisões mais informadas e rápidas, além de reduzir perdas e facilitar a organização dos recursos.

---

<h1>### Requisitos Iniciais</h1>

<h2>#### 1. Requisitos Funcionais</h2>

<h3>**Autenticação e Autorização de Usuários**</h3>
  - Login com diferentes níveis de acesso (administrador, gestor, usuário comum).
  - Cadastro e gerenciamento de usuários.
  - Recuperação de senha.

<h3>**Gestão de Equipamentos e Estoque**</h3>
  - Cadastro de novos equipamentos com detalhes (nome, código, descrição, localização).
  - Registro de entradas e saídas de equipamentos no estoque.
  - Monitoramento de disponibilidade em tempo real.
  - Atualização de status do equipamento (em uso, disponível, manutenção).

<h3>**Controle de Retirada e Devolução**</h3>
  - Registro de retirada de equipamentos com data, hora e funcionário responsável.
  - Registro de devolução e atualização automática do estoque.
  - Permissão para gestores revisarem o histórico de retiradas e devoluções.

<h3>**Relatórios e Análises**</h3>
  - Relatório de movimentação de estoque por período.
  - Relatórios de frequência de uso e devoluções em atraso.
  - Relatório de equipamentos em manutenção e previsão de disponibilidade.
  - Exportação de dados para Excel ou PDF.

<h3>**Alertas e Notificações**</h3>
  - Notificação automática de equipamentos não devolvidos após um período determinado.
  - Alertas para estoque baixo de determinados equipamentos.
  - Notificação para gestores sobre devoluções atrasadas.

<h3>**Interface de Gestão e Consulta**</h3>
  - Painel para monitorar o status do estoque e ver movimentações em tempo real.
  - Interface de pesquisa para localizar rapidamente equipamentos específicos.
  - Filtros de pesquisa por status, data, usuário responsável, entre outros.

<h2>#### 2. Requisitos Não Funcionais</h2>

<h3>**Banco de Dados**</h3>
  - Utilização de PostgreSQL, gerenciado através do pgAdmin, para armazenamento seguro e eficiente dos dados.

<h3>**Desempenho**</h3>
  - Respostas rápidas para operações de consulta e atualização.
  - Escalabilidade para suportar grandes volumes de dados e usuários.

<h3>**Usabilidade**</h3>
  - Interface intuitiva e fácil de usar para usuários com diferentes níveis de familiaridade com tecnologia.
  - Compatibilidade com dispositivos móveis para facilitar o uso em campo.

<h3>**Segurança**</h3>
  - Proteção contra acessos não autorizados através de autenticação robusta.
  - Registro de logs de atividade para auditoria.
  - Backup automático de dados.

<h3>**Compatibilidade**</h3>
  - Desenvolvimento utilizando PHP com Laravel para um código organizado e reutilizável.
  - Compatibilidade com navegadores modernos e responsividade para diferentes dispositivos.

---

<h2>### Wireframe de Interface Principal</h2>

<a>https://docs.google.com/document/d/1bO4wgnMtdgHE01MpD_sgdR73Ox7Kkjd6UhqcJ-xPEMk/edit?pli=1&tab=t.0#heading=h.64zrpo66uvf8 </a>
