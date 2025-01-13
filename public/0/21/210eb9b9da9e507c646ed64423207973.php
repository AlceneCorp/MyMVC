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
        <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"h2\"><i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard</h1>
                
            </div>

            <!-- Dashboard Stats -->
            <div class=\"row\">
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-primary text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-users fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Nombre d'utilisateurs</h5>
                                <p class=\"card-text fs-4\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["users_count"] ?? null), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-success text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-book fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Total de logs</h5>
                                <p class=\"card-text fs-4\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count"] ?? null), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-warning text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-exclamation-triangle fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Avertissements</h5>
                                <p class=\"card-text fs-4\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count_warning"] ?? null), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-danger text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-exclamation-triangle fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Problèmes critiques</h5>
                                <p class=\"card-text fs-4\">";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["log_count_error"] ?? null), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-dark text-white\">
                    <h5><i class=\"fas fa-history me-2\"></i> Activité Récente</h5>
                </div>
                <div class=\"card-body\">
                    <ul class=\"list-group\">
                        ";
        // line 80
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["log_recent_activity"] ?? null))) {
            // line 81
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["log_recent_activity"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["log_activity"]) {
                // line 82
                yield "                                <li class=\"list-group-item\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log_activity"], "MESSAGE", [], "any", false, false, false, 82), "html", null, true);
                yield "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['log_activity'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "                        ";
        } else {
            // line 85
            yield "                            <li class=\"list-group-item text-muted\">Aucune activité trouvée</li>
                        ";
        }
        // line 87
        yield "                    </ul>
                </div>
            </div>

            <!-- Section pour les graphiques -->
            <div class=\"row\">
                <!-- Premier graphique - Nombre de visiteurs par mois -->
                <div class=\"col-md-12\">
                    <div class=\"card shadow-sm mb-4\">
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Visiteurs par mois sur ";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield " </h5>
                        </div>
                        <div class=\"card-body\">
                            <canvas id=\"visitorChart\" height=\"300\"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Deuxième graphique - Pages visitées par mois -->
                <div class=\"col-md-12\">
                    <div class=\"card shadow-sm mb-4\">
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Pages visitées par mois sur ";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield "</h5>
                        </div>
                        <div class=\"card-body\">
                            <canvas id=\"pageChart\" height=\"300\"></canvas>
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

    // line 123
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 124
        yield "<!-- Inclure Chart.js -->
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<!-- Script pour récupérer les données PHP et afficher les graphiques -->
<script>
\$(document).ready(function() 
{
    // Récupérer les données PHP via AJAX
    \$.ajax({
        url: '";
        // line 132
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
        return array (  236 => 132,  226 => 124,  219 => 123,  202 => 109,  187 => 97,  175 => 87,  171 => 85,  168 => 84,  159 => 82,  154 => 81,  152 => 80,  135 => 66,  119 => 53,  103 => 40,  87 => 27,  66 => 8,  64 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
<div class=\"container-fluid\">
    <div class=\"row\">
        
        {% include 'admin/include/adminMenu.twig' %}

        <!-- Main Content -->
        <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"h2\"><i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard</h1>
                
            </div>

            <!-- Dashboard Stats -->
            <div class=\"row\">
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-primary text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-users fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Nombre d'utilisateurs</h5>
                                <p class=\"card-text fs-4\">{{users_count}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-success text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-book fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Total de logs</h5>
                                <p class=\"card-text fs-4\">{{log_count}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-warning text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-exclamation-triangle fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Avertissements</h5>
                                <p class=\"card-text fs-4\">{{log_count_warning}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xl-3 col-lg-6 col-sm-6 mb-4\">
                    <div class=\"card border-0 shadow-sm bg-danger text-white\">
                        <div class=\"card-body d-flex align-items-center\">
                            <div class=\"me-3\">
                                <i class=\"fas fa-exclamation-triangle fa-3x\"></i>
                            </div>
                            <div>
                                <h5 class=\"card-title\">Problèmes critiques</h5>
                                <p class=\"card-text fs-4\">{{log_count_error}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class=\"card shadow-sm mb-4\">
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
            <div class=\"row\">
                <!-- Premier graphique - Nombre de visiteurs par mois -->
                <div class=\"col-md-12\">
                    <div class=\"card shadow-sm mb-4\">
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Visiteurs par mois sur {{ date | date('Y') }} </h5>
                        </div>
                        <div class=\"card-body\">
                            <canvas id=\"visitorChart\" height=\"300\"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Deuxième graphique - Pages visitées par mois -->
                <div class=\"col-md-12\">
                    <div class=\"card shadow-sm mb-4\">
                        <div class=\"card-header bg-dark text-white\">
                            <h5><i class=\"fas fa-chart-bar me-2\"></i> Pages visitées par mois sur {{ date | date('Y') }}</h5>
                        </div>
                        <div class=\"card-body\">
                            <canvas id=\"pageChart\" height=\"300\"></canvas>
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
