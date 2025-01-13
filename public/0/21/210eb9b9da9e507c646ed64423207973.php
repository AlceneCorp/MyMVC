<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/dashboard.twig */
class __TwigTemplate_e66e23c39cb0434a0be8c07f95d234b5 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'jquery' => [$this, 'block_jquery'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "admin/dashboard.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<div class=\"container-fluid\">
    <div class=\"row\">
        
        ";
        // line 7
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "admin/dashboard.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
        <!-- Main Content -->
        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"h2\"><i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard</h1>
            </div>

            <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-server me-2\"></i> Statut du Serveur</h5>
                </div>
                <div class=\"card-body\">
                    <table class=\"table table-striped table-bordered\">
                        <tbody>
                            <tr>
                                <th scope=\"row\">Date du dernier redémarrage du serveur</th>
                                <td>";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "server_uptime", [], "any", false, false, false, 25), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Statut MySQL</th>
                                <td>
                                    ";
        // line 30
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "mysql", [], "any", false, false, false, 30)) {
            // line 31
            yield "                                        <span class=\"badge bg-success\"><i class=\"fas fa-check\"></i> Connecté</span>
                                    ";
        } else {
            // line 33
            yield "                                        <span class=\"badge bg-danger\"><i class=\"fas fa-times\"></i> Déconnecté</span>
                                    ";
        }
        // line 35
        yield "                                </td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Version de MySQL</th>
                                <td>";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "mysql_version", [], "any", false, false, false, 39), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Version PHP</th>
                                <td>";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "php_version", [], "any", false, false, false, 43), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Système d'exploitation</th>
                                <td>";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "os", [], "any", false, false, false, 47), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Serveur Web</th>
                                <td>";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "server_software", [], "any", false, false, false, 51), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">IP du Serveur</th>
                                <td>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "server_ip", [], "any", false, false, false, 55), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de processus Apache actifs</th>
                                <td>";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "apache_processes", [], "any", false, false, false, 59), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Temps d'exécution maximum</th>
                                <td>";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "max_execution_time", [], "any", false, false, false, 63), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Taille maximale de téléchargement</th>
                                <td>";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "upload_max_filesize", [], "any", false, false, false, 67), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Taille maximale des requêtes POST</th>
                                <td>";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "post_max_size", [], "any", false, false, false, 71), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Temps de réponse du serveur</th>
                                <td>";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "response_time", [], "any", false, false, false, 75), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de requêtes MySQL actives</th>
                                <td>";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "mysql_active_queries", [], "any", false, false, false, 79), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Usage de la mémoire PHP</th>
                                <td>";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "php_memory_usage", [], "any", false, false, false, 83), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de fichiers ouverts par PHP</th>
                                <td>";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["server_status"] ?? null), "open_files", [], "any", false, false, false, 87), "html", null, true);
        yield "</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Dashboard Stats -->
            <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-tachometer-alt me-2\"></i> Statistiques du Dashboard</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-striped table-bordered\">
                            <tbody>
                                <tr class=\"table-primary\">
                                    <td><i class=\"fas fa-users fa-fw\"></i> Nombre d'utilisateurs</td>
                                    <td>";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["users_count"] ?? null), "html", null, true);
        yield "</td>
                                </tr>
                                <tr class=\"table-success\">
                                    <td><i class=\"fas fa-book fa-fw\"></i> Total de logs</td>
                                    <td>";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count"] ?? null), "html", null, true);
        yield "</td>
                                </tr>
                                <tr class=\"table-warning\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Avertissements</td>
                                    <td>";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count_warning"] ?? null), "html", null, true);
        yield "</td>
                                </tr>
                                <tr class=\"table-danger\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Erreurs</td>
                                    <td>";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count_error"] ?? null), "html", null, true);
        yield "</td>
                                </tr>
                                <tr class=\"table-danger\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Problèmes critiques</td>
                                    <td>";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count_critical"] ?? null), "html", null, true);
        yield "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class=\"card shadow-sm mb-4 mt-3\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-history me-2\"></i> Activité Récente</h5>
                </div>
                <div class=\"card-body\">
                    <ul class=\"list-group\">
                        ";
        // line 137
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["log_recent_activity"] ?? null))) {
            // line 138
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["log_recent_activity"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["log_activity"]) {
                // line 139
                yield "                                <li class=\"list-group-item\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log_activity"], "MESSAGE", [], "any", false, false, false, 139), "html", null, true);
                yield "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['log_activity'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            yield "                        ";
        } else {
            // line 142
            yield "                            <li class=\"list-group-item text-muted\">Aucune activité trouvée</li>
                        ";
        }
        // line 144
        yield "                    </ul>
                </div>
            </div>

            <!-- Section pour les graphiques -->
            <div class=\"row gy-3\">
                <!-- Premier graphique -->
                <div class=\"col-6\">
                    <div class=\"card shadow-sm h-100\"> <!-- Utilisation de la classe h-100 pour que la carte prenne toute la hauteur disponible -->
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Visiteurs par mois sur ";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield " </h5>
                        </div>
                        <div class=\"card-body d-flex flex-column\">
                            <canvas id=\"visitorChart\" class=\"flex-fill\"></canvas> <!-- Utilisation de flex-fill pour faire prendre toute la hauteur disponible au canvas -->
                        </div>
                    </div>
                </div>

                <!-- Deuxième graphique -->
                <div class=\"col-6\">
                    <div class=\"card shadow-sm h-100\"> <!-- Utilisation de la classe h-100 pour que la carte prenne toute la hauteur disponible -->
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Pages visitées par mois sur ";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield "</h5>
                        </div>
                        <div class=\"card-body d-flex flex-column\">
                            <canvas id=\"pageChart\" class=\"flex-fill\"></canvas> <!-- Utilisation de flex-fill pour faire prendre toute la hauteur disponible au canvas -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
";
        yield from [];
    }

    // line 181
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 182
        yield "<!-- Inclure Chart.js -->
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<!-- Script pour récupérer les données PHP et afficher les graphiques -->
<script>
\$(document).ready(function() 
{
    // Récupérer les données PHP via AJAX
    \$.ajax({
        url: '";
        // line 190
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/admin/ajax/dashboard',
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);

            // Premier graphique - Nombre de visiteurs par mois
            var ctx1 = document.getElementById('visitorChart').getContext('2d');

            // Fonction pour déterminer la couleur en fonction du nombre de visiteurs
            function getBarColor(visitorCount) 
            {
                if (visitorCount <= 100) 
                {
                    return '#28a745'; // Vert pour 1 à 100
                } 
                else if (visitorCount <= 500) 
                {
                    return '#4e73df'; // Bleu pour 101 à 500
                } 
                else 
                {
                    return '#e74a3b'; // Rouge pour plus de 500
                }
            }

            new Chart(ctx1, 
            {
                type: 'bar',
                data: {
                    labels: data.visitor_graph.months,
                    datasets: [{
                        label: 'Visiteurs',
                        data: data.visitor_graph.visitor_counts,
                        backgroundColor: data.visitor_graph.visitor_counts.map(getBarColor), // Appliquer la couleur dynamique
                        borderColor: data.visitor_graph.visitor_counts.map(getBarColor), // Appliquer la couleur dynamique aux bordures aussi
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Deuxième graphique - Pages visitées par mois
            var ctx2 = document.getElementById('pageChart').getContext('2d');

            // Créer les labels des mois
            var pageLabels = data.page_visits_graph.months;

            // Créer les datasets pour chaque page
            var pageData = data.page_visits_graph.page_names.map((page, index) => {
                var visits = data.page_visits_graph.page_visits_data.map((monthData) => {
                    return monthData[page] || 0; // Si aucune visite pour la page dans ce mois, mettre 0
                });

                // Calculer une teinte de base et générer des couleurs analogues
                const baseHue = (index * 360 / data.page_visits_graph.page_names.length) % 360; // Répartir les teintes
                const hueOffset = (index % 5) * 20 - 40; // Variation autour de la teinte de base (dans une plage de -40 à 40)
                const hue = (baseHue + hueOffset + 360) % 360; // Calcul de la teinte harmonieuse

                // Appliquer une saturation et luminosité constantes pour une palette harmonieuse
                const backgroundColor = `hsla(\${hue}, 80%, 50%, 1)`; // Couleur semi-transparente
                const borderColor = `hsla(\${hue}, 100%, 100%, 1)`; // Couleur pleine

                return {
                    label: page,
                    data: visits,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    borderWidth: 1
                };
            });

            // Créer le graphique
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: pageLabels,
                    datasets: pageData
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération des données :', error);
        }
    });

});
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/dashboard.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  345 => 190,  335 => 182,  328 => 181,  311 => 166,  296 => 154,  284 => 144,  280 => 142,  277 => 141,  268 => 139,  263 => 138,  261 => 137,  243 => 122,  236 => 118,  229 => 114,  222 => 110,  215 => 106,  193 => 87,  186 => 83,  179 => 79,  172 => 75,  165 => 71,  158 => 67,  151 => 63,  144 => 59,  137 => 55,  130 => 51,  123 => 47,  116 => 43,  109 => 39,  103 => 35,  99 => 33,  95 => 31,  93 => 30,  85 => 25,  66 => 8,  64 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
<div class=\"container-fluid\">
    <div class=\"row\">
        
        {% include 'admin/include/adminMenu.twig' %}

        <!-- Main Content -->
        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"h2\"><i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard</h1>
            </div>

            <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-server me-2\"></i> Statut du Serveur</h5>
                </div>
                <div class=\"card-body\">
                    <table class=\"table table-striped table-bordered\">
                        <tbody>
                            <tr>
                                <th scope=\"row\">Date du dernier redémarrage du serveur</th>
                                <td>{{ server_status.server_uptime }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Statut MySQL</th>
                                <td>
                                    {% if server_status.mysql %}
                                        <span class=\"badge bg-success\"><i class=\"fas fa-check\"></i> Connecté</span>
                                    {% else %}
                                        <span class=\"badge bg-danger\"><i class=\"fas fa-times\"></i> Déconnecté</span>
                                    {% endif %}
                                </td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Version de MySQL</th>
                                <td>{{ server_status.mysql_version }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Version PHP</th>
                                <td>{{ server_status.php_version }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Système d'exploitation</th>
                                <td>{{ server_status.os }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Serveur Web</th>
                                <td>{{ server_status.server_software }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">IP du Serveur</th>
                                <td>{{ server_status.server_ip }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de processus Apache actifs</th>
                                <td>{{ server_status.apache_processes }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Temps d'exécution maximum</th>
                                <td>{{ server_status.max_execution_time }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Taille maximale de téléchargement</th>
                                <td>{{ server_status.upload_max_filesize }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Taille maximale des requêtes POST</th>
                                <td>{{ server_status.post_max_size }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Temps de réponse du serveur</th>
                                <td>{{ server_status.response_time }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de requêtes MySQL actives</th>
                                <td>{{ server_status.mysql_active_queries }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Usage de la mémoire PHP</th>
                                <td>{{ server_status.php_memory_usage }}</td>
                            </tr>
                            <tr>
                                <th scope=\"row\">Nombre de fichiers ouverts par PHP</th>
                                <td>{{ server_status.open_files }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Dashboard Stats -->
            <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-tachometer-alt me-2\"></i> Statistiques du Dashboard</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-striped table-bordered\">
                            <tbody>
                                <tr class=\"table-primary\">
                                    <td><i class=\"fas fa-users fa-fw\"></i> Nombre d'utilisateurs</td>
                                    <td>{{ users_count }}</td>
                                </tr>
                                <tr class=\"table-success\">
                                    <td><i class=\"fas fa-book fa-fw\"></i> Total de logs</td>
                                    <td>{{ log_count }}</td>
                                </tr>
                                <tr class=\"table-warning\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Avertissements</td>
                                    <td>{{ log_count_warning }}</td>
                                </tr>
                                <tr class=\"table-danger\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Erreurs</td>
                                    <td>{{ log_count_error }}</td>
                                </tr>
                                <tr class=\"table-danger\">
                                    <td><i class=\"fas fa-exclamation-triangle fa-fw\"></i> Problèmes critiques</td>
                                    <td>{{ log_count_critical }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class=\"card shadow-sm mb-4 mt-3\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-history me-2\"></i> Activité Récente</h5>
                </div>
                <div class=\"card-body\">
                    <ul class=\"list-group\">
                        {% if log_recent_activity is not empty %}
                            {% for log_activity in log_recent_activity %}
                                <li class=\"list-group-item\">{{ log_activity.MESSAGE }}</li>
                            {% endfor %}
                        {% else %}
                            <li class=\"list-group-item text-muted\">Aucune activité trouvée</li>
                        {% endif %}
                    </ul>
                </div>
            </div>

            <!-- Section pour les graphiques -->
            <div class=\"row gy-3\">
                <!-- Premier graphique -->
                <div class=\"col-6\">
                    <div class=\"card shadow-sm h-100\"> <!-- Utilisation de la classe h-100 pour que la carte prenne toute la hauteur disponible -->
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Visiteurs par mois sur {{ date | date('Y') }} </h5>
                        </div>
                        <div class=\"card-body d-flex flex-column\">
                            <canvas id=\"visitorChart\" class=\"flex-fill\"></canvas> <!-- Utilisation de flex-fill pour faire prendre toute la hauteur disponible au canvas -->
                        </div>
                    </div>
                </div>

                <!-- Deuxième graphique -->
                <div class=\"col-6\">
                    <div class=\"card shadow-sm h-100\"> <!-- Utilisation de la classe h-100 pour que la carte prenne toute la hauteur disponible -->
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Pages visitées par mois sur {{ date | date('Y') }}</h5>
                        </div>
                        <div class=\"card-body d-flex flex-column\">
                            <canvas id=\"pageChart\" class=\"flex-fill\"></canvas> <!-- Utilisation de flex-fill pour faire prendre toute la hauteur disponible au canvas -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
{% endblock %}



{% block jquery %}
<!-- Inclure Chart.js -->
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<!-- Script pour récupérer les données PHP et afficher les graphiques -->
<script>
\$(document).ready(function() 
{
    // Récupérer les données PHP via AJAX
    \$.ajax({
        url: '{{base_url}}/admin/ajax/dashboard',
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);

            // Premier graphique - Nombre de visiteurs par mois
            var ctx1 = document.getElementById('visitorChart').getContext('2d');

            // Fonction pour déterminer la couleur en fonction du nombre de visiteurs
            function getBarColor(visitorCount) 
            {
                if (visitorCount <= 100) 
                {
                    return '#28a745'; // Vert pour 1 à 100
                } 
                else if (visitorCount <= 500) 
                {
                    return '#4e73df'; // Bleu pour 101 à 500
                } 
                else 
                {
                    return '#e74a3b'; // Rouge pour plus de 500
                }
            }

            new Chart(ctx1, 
            {
                type: 'bar',
                data: {
                    labels: data.visitor_graph.months,
                    datasets: [{
                        label: 'Visiteurs',
                        data: data.visitor_graph.visitor_counts,
                        backgroundColor: data.visitor_graph.visitor_counts.map(getBarColor), // Appliquer la couleur dynamique
                        borderColor: data.visitor_graph.visitor_counts.map(getBarColor), // Appliquer la couleur dynamique aux bordures aussi
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Deuxième graphique - Pages visitées par mois
            var ctx2 = document.getElementById('pageChart').getContext('2d');

            // Créer les labels des mois
            var pageLabels = data.page_visits_graph.months;

            // Créer les datasets pour chaque page
            var pageData = data.page_visits_graph.page_names.map((page, index) => {
                var visits = data.page_visits_graph.page_visits_data.map((monthData) => {
                    return monthData[page] || 0; // Si aucune visite pour la page dans ce mois, mettre 0
                });

                // Calculer une teinte de base et générer des couleurs analogues
                const baseHue = (index * 360 / data.page_visits_graph.page_names.length) % 360; // Répartir les teintes
                const hueOffset = (index % 5) * 20 - 40; // Variation autour de la teinte de base (dans une plage de -40 à 40)
                const hue = (baseHue + hueOffset + 360) % 360; // Calcul de la teinte harmonieuse

                // Appliquer une saturation et luminosité constantes pour une palette harmonieuse
                const backgroundColor = `hsla(\${hue}, 80%, 50%, 1)`; // Couleur semi-transparente
                const borderColor = `hsla(\${hue}, 100%, 100%, 1)`; // Couleur pleine

                return {
                    label: page,
                    data: visits,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    borderWidth: 1
                };
            });

            // Créer le graphique
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: pageLabels,
                    datasets: pageData
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération des données :', error);
        }
    });

});
</script>
{% endblock %}", "admin/dashboard.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\dashboard.twig");
    }
}
