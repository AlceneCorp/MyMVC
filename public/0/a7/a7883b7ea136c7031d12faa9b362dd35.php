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
            <!-- Menu latéral -->
            ";
        // line 7
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "admin/logs.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
            <!-- Contenu principal -->
            <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
                <!-- Header Section -->
                <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                    <h1 class=\"text-center mb-4\"><i class=\"fas fa-book me-2\"></i> Logs de l'application</h1>
                </div>

                <!-- Pagination -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page ";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            ";
        // line 24
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 25
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 31
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            ";
        }
        // line 35
        yield "                            
                            ";
        // line 36
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 37
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/1\">1</a>
                                </li>
                                ";
            // line 40
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 41
                yield "                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                ";
            }
            // line 45
            yield "                            ";
        }
        // line 46
        yield "                            
                            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 48
            yield "                                ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 49
                yield "                                    <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                        <a class=\"page-link\" href=\"";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
                yield "/admin/logs/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                    </li>
                                ";
            }
            // line 53
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "                            
                            ";
        // line 55
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 56
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
        }
        // line 60
        yield "                            
                            ";
        // line 61
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 62
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 73
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            ";
        }
        // line 77
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
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["logs"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 99
            yield "                                    <tr>
                                        <td>";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ID", [], "any", false, false, false, 100), "html", null, true);
            yield "</td>
                                        <td>
                                            ";
            // line 102
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 102) == "CONFIG")) {
                // line 103
                yield "                                                <span class=\"badge bg-primary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 103), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 104
$context["log"], "CATEGORY", [], "any", false, false, false, 104) == "USERS")) {
                // line 105
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 105), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 106
$context["log"], "CATEGORY", [], "any", false, false, false, 106) == "SECURITY")) {
                // line 107
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 107), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 108
$context["log"], "CATEGORY", [], "any", false, false, false, 108) == "SYSTEM")) {
                // line 109
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 109), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 110
$context["log"], "CATEGORY", [], "any", false, false, false, 110) == "APPLICATION")) {
                // line 111
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CATEGORY", [], "any", false, false, false, 111), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 113
            yield "                                        </td>
                                        <td>
                                            ";
            // line 115
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 115) == "ERROR")) {
                // line 116
                yield "                                                <span class=\"badge bg-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 116), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 117
$context["log"], "LEVEL", [], "any", false, false, false, 117) == "INFO")) {
                // line 118
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 118), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 119
$context["log"], "LEVEL", [], "any", false, false, false, 119) == "WARNING")) {
                // line 120
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 120), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 121
$context["log"], "LEVEL", [], "any", false, false, false, 121) == "DEBUG")) {
                // line 122
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 122), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 123
$context["log"], "LEVEL", [], "any", false, false, false, 123) == "CRITICAL")) {
                // line 124
                yield "                                                <span class=\"badge bg-dark\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 124), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 125
$context["log"], "LEVEL", [], "any", false, false, false, 125) == "SUCCESS")) {
                // line 126
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "LEVEL", [], "any", false, false, false, 126), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 128
            yield "                                        </td>
                                        <td>";
            // line 129
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "MESSAGE", [], "any", false, false, false, 129), "html", null, true);
            yield "</td>
                                        <td>";
            // line 130
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["users"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 130), [], "array", true, true, false, 130) &&  !(null === (($_v0 = ($context["users"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 130)] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = ($context["users"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["log"], "USERS_ID", [], "any", false, false, false, 130)] ?? null) : null), "html", null, true)) : ("Inconnu"));
            yield "</td>
                                        <td><span class=\"badge bg-secondary\">";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "IP_ADDRESS", [], "any", false, false, false, 131), "html", null, true);
            yield "</span></td>
                                        <td>
                                            ";
            // line 133
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 133) == "GET")) {
                // line 134
                yield "                                                <span class=\"badge bg-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 134), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 135
$context["log"], "METHOD", [], "any", false, false, false, 135) == "POST")) {
                // line 136
                yield "                                                <span class=\"badge bg-success\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 136), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 137
$context["log"], "METHOD", [], "any", false, false, false, 137) == "PUT")) {
                // line 138
                yield "                                                <span class=\"badge bg-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 138), "html", null, true);
                yield "</span>
                                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 139
$context["log"], "METHOD", [], "any", false, false, false, 139) == "DELETE")) {
                // line 140
                yield "                                                <span class=\"badge bg-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 140), "html", null, true);
                yield "</span>
                                            ";
            } else {
                // line 142
                yield "                                                <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "METHOD", [], "any", false, false, false, 142), "html", null, true);
                yield "</span>
                                            ";
            }
            // line 144
            yield "                                        </td>
                                        <td>";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "CREATED_AT", [], "any", false, false, false, 145), "d-m-Y H:i"), "html", null, true);
            yield "</td>
                                    </tr>
                                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 148
            yield "                                    <tr>
                                        <td colspan=\"8\" class=\"text-center\">Aucun log disponible.</td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        yield "                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination encore -->
                <div class=\"d-flex justify-content-between align-items-center mt-4\">
                    <div>
                        <span>Page ";
        // line 160
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                    </div>

                    <nav aria-label=\"Pagination\">
                        <ul class=\"pagination\">
                            ";
        // line 165
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 166
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 167
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\">&laquo; Précédent</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 172
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">&laquo; Précédent</span>
                                </li>
                            ";
        }
        // line 176
        yield "                            
                            ";
        // line 177
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 178
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 179
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/1\">1</a>
                                </li>
                                ";
            // line 181
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 182
                yield "                                    <li class=\"page-item disabled\">
                                        <span class=\"page-link\">...</span>
                                    </li>
                                ";
            }
            // line 186
            yield "                            ";
        }
        // line 187
        yield "                            
                            ";
        // line 188
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 189
            yield "                                ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 190
                yield "                                    <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                        <a class=\"page-link\" href=\"";
                // line 191
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
                yield "/admin/logs/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                    </li>
                                ";
            }
            // line 194
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        yield "                            
                            ";
        // line 196
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 197
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
        }
        // line 201
        yield "                            
                            ";
        // line 202
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 203
            yield "                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                        <span aria-hidden=\"true\">";
            // line 205
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                    </a>
                                </li>
                                <li class=\"page-item\">
                                    <a class=\"page-link\" href=\"";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseUrl"] ?? null), "html", null, true);
            yield "/admin/logs/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">Suivant &raquo;</span>
                                    </a>
                                </li>
                            ";
        } else {
            // line 214
            yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">Suivant &raquo;</span>
                                </li>
                            ";
        }
        // line 218
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
        return array (  550 => 218,  544 => 214,  534 => 209,  527 => 205,  521 => 204,  518 => 203,  516 => 202,  513 => 201,  507 => 197,  505 => 196,  502 => 195,  496 => 194,  486 => 191,  479 => 190,  476 => 189,  472 => 188,  469 => 187,  466 => 186,  460 => 182,  458 => 181,  453 => 179,  450 => 178,  448 => 177,  445 => 176,  439 => 172,  429 => 167,  426 => 166,  424 => 165,  414 => 160,  404 => 152,  395 => 148,  387 => 145,  384 => 144,  378 => 142,  372 => 140,  370 => 139,  365 => 138,  363 => 137,  358 => 136,  356 => 135,  351 => 134,  349 => 133,  344 => 131,  340 => 130,  336 => 129,  333 => 128,  327 => 126,  325 => 125,  320 => 124,  318 => 123,  313 => 122,  311 => 121,  306 => 120,  304 => 119,  299 => 118,  297 => 117,  292 => 116,  290 => 115,  286 => 113,  280 => 111,  278 => 110,  273 => 109,  271 => 108,  266 => 107,  264 => 106,  259 => 105,  257 => 104,  252 => 103,  250 => 102,  245 => 100,  242 => 99,  237 => 98,  214 => 77,  208 => 73,  198 => 68,  191 => 64,  185 => 63,  182 => 62,  180 => 61,  177 => 60,  171 => 56,  169 => 55,  166 => 54,  160 => 53,  150 => 50,  143 => 49,  140 => 48,  136 => 47,  133 => 46,  130 => 45,  124 => 41,  122 => 40,  117 => 38,  114 => 37,  112 => 36,  109 => 35,  103 => 31,  93 => 26,  90 => 25,  88 => 24,  78 => 19,  65 => 8,  63 => 7,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
    <div class=\"container-fluid mt-4\">
        <div class=\"row\">
            <!-- Menu latéral -->
            {% include 'admin/include/adminMenu.twig' %}

            <!-- Contenu principal -->
            <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
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
