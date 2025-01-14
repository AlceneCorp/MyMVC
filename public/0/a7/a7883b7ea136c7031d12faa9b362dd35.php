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

/* admin/logs.twig */
class __TwigTemplate_56f183a53f05bb8a69839d845d477d33 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin/logs.twig", 1);
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
        yield "    <div class=\"container-fluid mt-4\">
        <div class=\"row\">
            <!-- Contenu principal -->
            <main class=\"col-md-12 ms-sm-auto col-lg-12 px-md-12\">
                <!-- Header Section -->
                <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                    <h1 class=\"text-center mb-4\"><i class=\"fas fa-book me-2\"></i> Logs de l'application</h1>
                </div>

                <!-- Pagination -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            ";
        // line 21
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 22
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 28
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            ";
        }
        // line 32
        yield "                            
                            ";
        // line 33
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 34
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/1\">1</a>
                                </li>
                                ";
            // line 37
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 38
                yield "                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                ";
            }
            // line 42
            yield "                            ";
        }
        // line 43
        yield "                            
                            ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 45
            yield "                                ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 46
                yield "                                    <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                        <a class=\"page-link\" href=\"";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
                yield "/admin/logs/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                    </li>
                                ";
            }
            // line 50
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "                            
                            ";
        // line 52
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 53
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
        }
        // line 57
        yield "                            
                            ";
        // line 58
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 59
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 70
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            ";
        }
        // line 74
        yield "                        </ul>
                    </nav>
                </div>

                <!-- Table des logs -->
                <div class=\"card shadow-sm mb-4\">
                    <div class=\"card-body\">
                        <table class=\"table table-striped table-bordered\">
                            <thead class=\"thead-dark\">
                                <tr>
                                    <th>#</th>
                                    <th>Catégorie</th>
                                    <th>Niveau</th>
                                    <th>Message</th>
                                    <th>Utilisateur</th>
                                    <th>IP</th>
                                    <th>Méthode</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["logs"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 96
            yield "                                    <tr>
                                        <td>";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ID", [], "any", false, false, false, 97), "html", null, true);
            yield "</td>
                                        <td>
                                            ";
            // line 99
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 99) == "CONFIG")) {
                // line 100
                yield "                                                <span class=\"badge bg-primary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 100), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 101
$context["log"], "CATEGORY", [], "any", false, false, false, 101) == "USERS")) {
                // line 102
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 102), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 103
$context["log"], "CATEGORY", [], "any", false, false, false, 103) == "SECURITY")) {
                // line 104
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 104), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 105
$context["log"], "CATEGORY", [], "any", false, false, false, 105) == "SYSTEM")) {
                // line 106
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 106), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 107
$context["log"], "CATEGORY", [], "any", false, false, false, 107) == "APPLICATION")) {
                // line 108
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 108), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 110
            yield "                                        </td>
                                        <td>
                                            ";
            // line 112
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 112) == "ERROR")) {
                // line 113
                yield "                                                <span class=\"badge bg-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 113), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 114
$context["log"], "LEVEL", [], "any", false, false, false, 114) == "INFO")) {
                // line 115
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 115), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 116
$context["log"], "LEVEL", [], "any", false, false, false, 116) == "WARNING")) {
                // line 117
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 117), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 118
$context["log"], "LEVEL", [], "any", false, false, false, 118) == "DEBUG")) {
                // line 119
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 119), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 120
$context["log"], "LEVEL", [], "any", false, false, false, 120) == "CRITICAL")) {
                // line 121
                yield "                                                <span class=\"badge bg-dark\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 121), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 122
$context["log"], "LEVEL", [], "any", false, false, false, 122) == "SUCCESS")) {
                // line 123
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 123), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 125
            yield "                                        </td>
                                        <td>";
            // line 126
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "MESSAGE", [], "any", false, false, false, 126), "html", null, true);
            yield "</td>
                                        <td>";
            // line 127
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["users"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 127), [], "array", true, true, false, 127) &&  !(null === (($_v0 = ($context["users"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 127)] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = ($context["users"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 127)] ?? null) : null), "html", null, true)) : ("Inconnu"));
            yield "</td>
                                        <td><span class=\"badge bg-secondary\">";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "IP_ADDRESS", [], "any", false, false, false, 128), "html", null, true);
            yield "</span></td>
                                        <td>
                                            ";
            // line 130
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 130) == "GET")) {
                // line 131
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 131), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 132
$context["log"], "METHOD", [], "any", false, false, false, 132) == "POST")) {
                // line 133
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 133), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 134
$context["log"], "METHOD", [], "any", false, false, false, 134) == "PUT")) {
                // line 135
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 135), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 136
$context["log"], "METHOD", [], "any", false, false, false, 136) == "DELETE")) {
                // line 137
                yield "                                                <span class=\"badge bg-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 137), "html", null, true);
                yield "</span>
                                            ";
            } else {
                // line 139
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 139), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 141
            yield "                                        </td>
                                        <td>";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CREATED_AT", [], "any", false, false, false, 142), "d-m-Y H:i"), "html", null, true);
            yield "</td>
                                    </tr>
                                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 145
            yield "                                    <tr>
                                        <td colspan=\"8\" class=\"text-center\">Aucun log disponible.</td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 149
        yield "                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination encore -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page ";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            ";
        // line 162
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 163
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 169
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            ";
        }
        // line 173
        yield "                            
                            ";
        // line 174
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 175
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/1\">1</a>
                                </li>
                                ";
            // line 178
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 179
                yield "                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                ";
            }
            // line 183
            yield "                            ";
        }
        // line 184
        yield "                            
                            ";
        // line 185
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 186
            yield "                                ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 187
                yield "                                    <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                        <a class=\"page-link\" href=\"";
                // line 188
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
                yield "/admin/logs/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                    </li>
                                ";
            }
            // line 191
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        yield "                            
                            ";
        // line 193
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 194
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
        }
        // line 198
        yield "                            
                            ";
        // line 199
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 200
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 211
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            ";
        }
        // line 215
        yield "                        </ul>
                    </nav>
                </div>
            </main>
        </div>
    </div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/logs.twig";
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
        return array (  544 => 215,  538 => 211,  528 => 206,  521 => 202,  515 => 201,  512 => 200,  510 => 199,  507 => 198,  501 => 194,  499 => 193,  496 => 192,  490 => 191,  480 => 188,  473 => 187,  470 => 186,  466 => 185,  463 => 184,  460 => 183,  454 => 179,  452 => 178,  447 => 176,  444 => 175,  442 => 174,  439 => 173,  433 => 169,  423 => 164,  420 => 163,  418 => 162,  408 => 157,  398 => 149,  389 => 145,  381 => 142,  378 => 141,  372 => 139,  366 => 137,  364 => 136,  359 => 135,  357 => 134,  352 => 133,  350 => 132,  345 => 131,  343 => 130,  338 => 128,  334 => 127,  330 => 126,  327 => 125,  321 => 123,  319 => 122,  314 => 121,  312 => 120,  307 => 119,  305 => 118,  300 => 117,  298 => 116,  293 => 115,  291 => 114,  286 => 113,  284 => 112,  280 => 110,  274 => 108,  272 => 107,  267 => 106,  265 => 105,  260 => 104,  258 => 103,  253 => 102,  251 => 101,  246 => 100,  244 => 99,  239 => 97,  236 => 96,  231 => 95,  208 => 74,  202 => 70,  192 => 65,  185 => 61,  179 => 60,  176 => 59,  174 => 58,  171 => 57,  165 => 53,  163 => 52,  160 => 51,  154 => 50,  144 => 47,  137 => 46,  134 => 45,  130 => 44,  127 => 43,  124 => 42,  118 => 38,  116 => 37,  111 => 35,  108 => 34,  106 => 33,  103 => 32,  97 => 28,  87 => 23,  84 => 22,  82 => 21,  72 => 16,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
    <div class=\"container-fluid mt-4\">
        <div class=\"row\">
            <!-- Contenu principal -->
            <main class=\"col-md-12 ms-sm-auto col-lg-12 px-md-12\">
                <!-- Header Section -->
                <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                    <h1 class=\"text-center mb-4\"><i class=\"fas fa-book me-2\"></i> Logs de l'application</h1>
                </div>

                <!-- Pagination -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page {{ currentPage }} sur {{ totalPages }}</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            {% if currentPage > 1 %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ currentPage - 1 }}\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            {% else %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            {% endif %}
                            
                            {% if currentPage > 2 %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/1\">1</a>
                                </li>
                                {% if currentPage > 3 %}
                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                {% endif %}
                            {% endif %}
                            
                            {% for page in (currentPage - 1)..(currentPage + 1) %}
                                {% if page > 0 and page <= totalPages %}
                                    <li class=\"page-item {% if page == currentPage %}active{% endif %}\">
                                        <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ page }}\">{{ page }}</a>
                                    </li>
                                {% endif %}
                            {% endfor %}
                            
                            {% if currentPage < totalPages - 1 %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            {% endif %}
                            
                            {% if currentPage < totalPages %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ totalPages }}\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">{{ totalPages }}</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ currentPage + 1 }}\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            {% else %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            {% endif %}
                        </ul>
                    </nav>
                </div>

                <!-- Table des logs -->
                <div class=\"card shadow-sm mb-4\">
                    <div class=\"card-body\">
                        <table class=\"table table-striped table-bordered\">
                            <thead class=\"thead-dark\">
                                <tr>
                                    <th>#</th>
                                    <th>Catégorie</th>
                                    <th>Niveau</th>
                                    <th>Message</th>
                                    <th>Utilisateur</th>
                                    <th>IP</th>
                                    <th>Méthode</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for log in logs %}
                                    <tr>
                                        <td>{{ log.ID }}</td>
                                        <td>
                                            {% if log.CATEGORY == 'CONFIG' %}
                                                <span class=\"badge bg-primary\">{{ log.CATEGORY }}</span>
                                            {% elseif log.CATEGORY == 'USERS' %}
                                                <span class=\"badge bg-success\">{{ log.CATEGORY }}</span>
                                            {% elseif log.CATEGORY == 'SECURITY' %}
                                                <span class=\"badge bg-warning\">{{ log.CATEGORY }}</span>
                                            {% elseif log.CATEGORY == 'SYSTEM' %}
                                                <span class=\"badge bg-secondary\">{{ log.CATEGORY }}</span>
                                            {% elseif log.CATEGORY == 'APPLICATION' %}
                                                <span class=\"badge bg-info\">{{ log.CATEGORY }}</span>
                                            {% endif %}
                                        </td>
                                        <td>
                                            {% if log.LEVEL == 'ERROR' %}
                                                <span class=\"badge bg-danger\">{{ log.LEVEL }}</span>
                                            {% elseif log.LEVEL == 'INFO' %}
                                                <span class=\"badge bg-info\">{{ log.LEVEL }}</span>
                                            {% elseif log.LEVEL == 'WARNING' %}
                                                <span class=\"badge bg-warning\">{{ log.LEVEL }}</span>
                                            {% elseif log.LEVEL == 'DEBUG' %}
                                                <span class=\"badge bg-secondary\">{{ log.LEVEL }}</span>
                                            {% elseif log.LEVEL == 'CRITICAL' %}
                                                <span class=\"badge bg-dark\">{{ log.LEVEL }}</span>
                                            {% elseif log.LEVEL == 'SUCCESS' %}
                                                <span class=\"badge bg-success\">{{ log.LEVEL }}</span>
                                            {% endif %}
                                        </td>
                                        <td>{{ log.MESSAGE }}</td>
                                        <td>{{ users[log.USERS_ID] ?? 'Inconnu' }}</td>
                                        <td><span class=\"badge bg-secondary\">{{ log.IP_ADDRESS }}</span></td>
                                        <td>
                                            {% if log.METHOD == 'GET' %}
                                                <span class=\"badge bg-info\">{{ log.METHOD }}</span>
                                            {% elseif log.METHOD == 'POST' %}
                                                <span class=\"badge bg-success\">{{ log.METHOD }}</span>
                                            {% elseif log.METHOD == 'PUT' %}
                                                <span class=\"badge bg-warning\">{{ log.METHOD }}</span>
                                            {% elseif log.METHOD == 'DELETE' %}
                                                <span class=\"badge bg-danger\">{{ log.METHOD }}</span>
                                            {% else %}
                                                <span class=\"badge bg-secondary\">{{ log.METHOD }}</span>
                                            {% endif %}
                                        </td>
                                        <td>{{ log.CREATED_AT | date('d-m-Y H:i') }}</td>
                                    </tr>
                                {% else %}
                                    <tr>
                                        <td colspan=\"8\" class=\"text-center\">Aucun log disponible.</td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination encore -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page {{ currentPage }} sur {{ totalPages }}</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            {% if currentPage > 1 %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ currentPage - 1 }}\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            {% else %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            {% endif %}
                            
                            {% if currentPage > 2 %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/1\">1</a>
                                </li>
                                {% if currentPage > 3 %}
                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                {% endif %}
                            {% endif %}
                            
                            {% for page in (currentPage - 1)..(currentPage + 1) %}
                                {% if page > 0 and page <= totalPages %}
                                    <li class=\"page-item {% if page == currentPage %}active{% endif %}\">
                                        <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ page }}\">{{ page }}</a>
                                    </li>
                                {% endif %}
                            {% endfor %}
                            
                            {% if currentPage < totalPages - 1 %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            {% endif %}
                            
                            {% if currentPage < totalPages %}
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ totalPages }}\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">{{ totalPages }}</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"{{ baseUrl }}/admin/logs/{{ currentPage + 1 }}\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            {% else %}
                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            {% endif %}
                        </ul>
                    </nav>
                </div>
            </main>
        </div>
    </div>
{% endblock %}
", "admin/logs.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\logs.twig");
    }
}
