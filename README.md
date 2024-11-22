Semana 1: Planejamento e Pesquisa<br>


Objetivo: Identificar um problema e definir os requisitos do projeto. <br>
Henrique Arroyo: Design, Levantamento de Requisitos <br>
Eduardo Ananias: Design, Levantamento de Requisitos <br>
Leonardo Lira: Design, Levantamento de Requisitos<br>


1. Identificação do Problema<br>
A EHL SANEAMENTO, uma empresa de saneamento, enfrenta um problema crítico na gestão de seu estoque de equipamentos em um galpão específico. A questão central gira em torno da dificuldade de controlar a retirada de equipamentos pelos funcionários, o que causa falta de visibilidade e organização sobre o uso dos itens armazenados. Os gestores têm dificuldade para rastrear quais equipamentos foram retirados, por quem e com qual finalidade, o que pode levar a problemas como:<br>
Perda de Equipamentos: Sem um registro eficaz, equipamentos podem ser retirados sem controle e, eventualmente, perdidos ou danificados sem conhecimento da empresa.<br>
Baixa Eficiência Operacional: A ausência de um sistema que documente as movimentações de itens no galpão faz com que os gestores e funcionários percam tempo tentando localizar equipamentos ou confirmar retiradas e devoluções.<br>
Impacto nos Processos de Saneamento: A falta de controle sobre os equipamentos pode afetar a execução dos processos de manutenção e operação de saneamento, já que a falta de recursos adequados no momento certo atrasa o serviço e gera custos adicionais para reposição.<br>

2. Definição do Problema<br>
O problema é, portanto, uma deficiência na rastreabilidade e no controle da retirada de equipamentos do estoque, dificultando a gestão eficiente e precisa do inventário do galpão. Essa dificuldade de controle impacta negativamente na segurança e na responsabilidade sobre os ativos, bem como na transparência e responsabilidade dos funcionários envolvidos.<br>

3. Descrição da Solução<br>
A solução proposta é o desenvolvimento de um sistema informatizado para gerenciar o fluxo de equipamentos do galpão, onde cada retirada, devolução e movimentação seja registrada de forma organizada e acessível. A solução deve incluir as seguintes funcionalidades:<br>
Registro Detalhado de Retiradas e Devoluções: Um módulo que permite aos funcionários registrar a retirada de qualquer equipamento, documentando data, hora, funcionário responsável, equipamento específico e a área que o solicitou.<br>
Painel de Visibilidade para Gestores: Os gestores da área terão um painel com acesso direto a relatórios e registros de retiradas, permitindo acompanhar o status de cada equipamento. Isso ajuda a verificar se os equipamentos foram devolvidos no prazo ou se estão fora de uso por um período prolongado.<br>
Permissões e Acessos: Diferentes níveis de acesso serão implementados para assegurar que apenas gestores possam visualizar o histórico completo de movimentações, enquanto os funcionários terão permissões para registrar suas ações.<br>
Relatórios e Alertas Automatizados: O sistema poderá emitir relatórios semanais ou mensais sobre o inventário do galpão e alertar os gestores sobre equipamentos que não foram devolvidos em determinado período. Essa automação melhora a proatividade no controle de equipamentos.<br>
Integração de Dados em Tempo Real: Sempre que um equipamento é retirado ou devolvido, o inventário é atualizado automaticamente. Isso cria uma visão em tempo real da disponibilidade dos itens e evita a necessidade de contagens manuais frequentes.<br>
A implementação desse sistema trará benefícios significativos para o controle de equipamentos da EHL SANEAMENTO, assegurando que gestores possam monitorar o uso dos recursos e tomar decisões mais informadas e rápidas. Além disso, reduzirá perdas e facilitará a alocação e organização dos equipamentos, impactando diretamente na eficiência das operações da empresa.<br>


Requisitos iniciais:<br>

1. Requisitos Funcionais<br>

Autenticação e Autorização de Usuários<br>
Login com diferentes níveis de acesso (administrador, gestor, usuário comum).<br>
Cadastro e gerenciamento de usuários.<br>
Recuperação de senha.<br>

Gestão de Equipamentos e Estoque<br>
Cadastro de novos equipamentos com informações detalhadas (nome, código, descrição, localização).<br>
Registro de entradas e saídas de equipamentos no estoque.<br>
Monitoramento de disponibilidade em tempo real.<br>
Atualização de status do equipamento (em uso, disponível, manutenção).<br>

Controle de Retirada e Devolução<br>
Registro de retirada de equipamentos com data, hora e funcionário responsável.<br>
Registro de devolução dos equipamentos e atualização automática do estoque.<br>
Permissão para gestores revisarem o histórico de retiradas e devoluções.<br>


Relatórios e Análises<br>
Relatório de movimentação de estoque por período.<br>
Relatórios de frequência de uso e devoluções em atraso.<br>
Relatório de equipamentos em manutenção e previsão de disponibilidade.<br>
Exportação de dados para Excel ou PDF.<br>

Alertas e Notificações<br>
Notificação automática de equipamentos não devolvidos após um período determinado.<br>
Alertas para estoque baixo de determinados equipamentos.<br>
Notificação para gestores sobre devoluções atrasadas.<br>

Interface de Gestão e Consulta<br>
Painel para monitorar o status do estoque e ver movimentações em tempo real.<br>
Interface de pesquisa para localizar rapidamente equipamentos específicos.<br>
Filtros de pesquisa por status, data, usuário responsável, entre outros.<br>




2. Requisitos Não Funcionais<br>

Banco de Dados<br>
Utilização de PostgreSQL, gerenciado através do pgAdmin, para armazenamento seguro e eficiente dos dados de estoque e movimentações.<br>

Desempenho<br>
Tempo de resposta rápido para operações de consulta e atualização de estoque.<br>
Capacidade de escalabilidade para suportar um grande volume de dados e usuários.<br>

Usabilidade<br>
Interface intuitiva e fácil de usar para usuários de diferentes níveis de familiaridade com tecnologia.<br>
Compatibilidade com dispositivos móveis para facilitar o uso em campo.<br>

Segurança<br>
Proteção contra acessos não autorizados através de autenticação robusta.<br>
Registro de logs de atividade para auditoria.<br>
Backup automático de dados para evitar perda de informações.<br>

Compatibilidade<br>
Desenvolvimento utilizando PHP com Laravel para garantir um código organizado e reutilizável.<br>
Compatibilidade com navegadores modernos e responsividade para diferentes dispositivos.<br>

Wireframe de interface principal: https://www.figma.com/design/MQBbgsOQc7W7U2Ce8eEQ7K/EHL?node-id=0-1&t=P7vSjx3JWksEEY76-1













# EHL
