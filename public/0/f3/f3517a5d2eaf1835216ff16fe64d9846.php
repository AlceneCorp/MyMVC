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

/* admin/users.twig */
class __TwigTemplate_d504458d2e455c044ed3cd87f7164db8 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin/users.twig", 1);
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
        yield "<div class=\"container-fluid mt-4\">
    <div class='row'>
        <!-- Menu latéral -->

        <main class=\"col-md-12 ms-sm-auto col-lg-12 px-md-12\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-users me-2\"></i> Liste des utilisateurs</h1>
            </div>

            <!-- Pagination -->
            <div class=\"d-flex justify-content-between align-items-center mt-4\">
                <div>
                    <span>Page ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                </div>

                <nav aria-label=\"Pagination\">
                    <ul class=\"pagination\">
                        ";
        // line 22
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 23
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                    <span aria-hidden=\"true\">&laquo; Précédent</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 29
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">&laquo; Précédent</span>
                            </li>
                        ";
        }
        // line 33
        yield "                            
                        ";
        // line 34
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 35
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/1\">1</a>
                            </li>
                            ";
            // line 38
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 39
                yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
            }
            // line 43
            yield "                        ";
        }
        // line 44
        yield "                            
                        ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 46
            yield "                            ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 47
                yield "                                <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                    <a class=\"page-link\" href=\"";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                yield "/admin/users/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                </li>
                            ";
            }
            // line 51
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        yield "                            
                        ";
        // line 53
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 54
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        ";
        }
        // line 58
        yield "                            
                        ";
        // line 59
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 60
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                    <span aria-hidden=\"true\">Suivant &raquo;</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 71
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">Suivant &raquo;</span>
                            </li>
                        ";
        }
        // line 75
        yield "                    </ul>
                </nav>
            </div>

            <!-- Tableau des utilisateurs -->
            <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover align-middle\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th class=\"col-1\">ID</th>
                            <th class=\"col-1\">Nom d'utilisateur</th>
                            <th class=\"col-1\">Statut</th>
                            <th class=\"col-5\">Permissions</th>
                            <th class=\"col-2\">Dernière connexion</th>
                            <th class=\"col-2\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 93
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["usersWithPermissions"] ?? null))) {
            // line 94
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["usersWithPermissions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 95
                yield "                                <tr>
                                    <td>";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 96), "getID", [], "method", false, false, false, 96), "html", null, true);
                yield "</td>
                                    <td>";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 97), "getUSERNAME", [], "method", false, false, false, 97), "html", null, true);
                yield "</td>
                                    <td style=\"text-align: center;\">
                                        ";
                // line 99
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 99), "getSTATUS", [], "method", false, false, false, 99) == "active")) {
                    // line 100
                    yield "                                            <span class=\"badge bg-success\">Actif</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 101
$context["entry"], "user", [], "any", false, false, false, 101), "getSTATUS", [], "method", false, false, false, 101) == "pending")) {
                    // line 102
                    yield "                                            <span class=\"badge bg-warning text-dark\">En attente</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 103
$context["entry"], "user", [], "any", false, false, false, 103), "getSTATUS", [], "method", false, false, false, 103) == "inactive")) {
                    // line 104
                    yield "                                            <span class=\"badge bg-secondary\">Inactif</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 105
$context["entry"], "user", [], "any", false, false, false, 105), "getSTATUS", [], "method", false, false, false, 105) == "banned")) {
                    // line 106
                    yield "                                            <span class=\"badge bg-danger\">Banni</span>
                                        ";
                }
                // line 108
                yield "                                    </td>
                                    <td>
                                        ";
                // line 110
                if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "permissions", [], "any", false, false, false, 110))) {
                    // line 111
                    yield "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "permissions", [], "any", false, false, false, 111));
                    foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                        // line 112
                        yield "                                                <span style=\"margin:2px; background-color:";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.color_rank_", CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getORDERS", [], "method", false, false, false, 112), ".value"), "html", null, true);
                        yield ";\" class=\"badge\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getFULLNAME", [], "method", false, false, false, 112), "html", null, true);
                        yield "</span>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['permission'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 114
                    yield "                                        ";
                } else {
                    // line 115
                    yield "                                            <span class=\"badge bg-secondary\">Aucune permission</span>
                                        ";
                }
                // line 117
                yield "                                    </td>
                                    <td>";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 118), "getLAST_LOGIN", [], "method", false, false, false, 118), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                                    <td class=\"text-center\">
                                        <!-- Lien pour bloquer/débloquer l'utilisateur -->
                                        
                                            ";
                // line 122
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 122), "getSTATUS", [], "method", false, false, false, 122) == "active")) {
                    // line 123
                    yield "                                                ";
                    if ($this->env->getFunction('checkPerm')->getCallable()("block_user")) {
                        // line 124
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                        yield "/admin/block/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 124), "getID", [], "method", false, false, false, 124), "html", null, true);
                        yield "\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-lock\"></i> Bannir
                                                ";
                    }
                    // line 127
                    yield "                                            ";
                } else {
                    // line 128
                    yield "                                                ";
                    if ($this->env->getFunction('checkPerm')->getCallable()("unblock_user")) {
                        // line 129
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                        yield "/admin/unblock/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 129), "getID", [], "method", false, false, false, 129), "html", null, true);
                        yield "\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-unlock\"></i> Débannir
                                                ";
                    }
                    // line 132
                    yield "                                            ";
                }
                // line 133
                yield "                                        </a>

                                        
                                        ";
                // line 136
                if ($this->env->getFunction('checkPerm')->getCallable()("manage_permissions")) {
                    // line 137
                    yield "                                            <!-- Lien pour éditer les permissions -->
                                            <a href=\"";
                    // line 138
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                    yield "/admin/edit-permissions/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 138), "getID", [], "method", false, false, false, 138), "html", null, true);
                    yield "\" class=\"btn btn-warning btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Modifier Permissions
                                            </a>
                                        ";
                }
                // line 142
                yield "
                                        ";
                // line 143
                if ($this->env->getFunction('checkPerm')->getCallable()("view_other_profiles")) {
                    // line 144
                    yield "                                            <!-- Voir le profil de l'utilisateur -->
                                            <a href=\"";
                    // line 145
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                    yield "/admin/users/view-profil/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 145), "getID", [], "method", false, false, false, 145), "html", null, true);
                    yield "\" class=\"btn btn-success btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Voir le profil
                                            </a>
                                        ";
                }
                // line 149
                yield "                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['entry'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            yield "                        ";
        } else {
            // line 153
            yield "                            <tr>
                                <td colspan=\"6\" class=\"text-center text-muted\">Aucun utilisateur trouvé</td>
                            </tr>
                        ";
        }
        // line 157
        yield "                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class=\"d-flex justify-content-between align-items-center mt-4\">
                <div>
                    <span>Page ";
        // line 164
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                </div>

                <nav aria-label=\"Pagination\">
                    <ul class=\"pagination\">
                        ";
        // line 169
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 170
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 171
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                    <span aria-hidden=\"true\">&laquo; Précédent</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 176
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">&laquo; Précédent</span>
                            </li>
                        ";
        }
        // line 180
        yield "                            
                        ";
        // line 181
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 182
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/1\">1</a>
                            </li>
                            ";
            // line 185
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 186
                yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
            }
            // line 190
            yield "                        ";
        }
        // line 191
        yield "                            
                        ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 193
            yield "                            ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 194
                yield "                                <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                    <a class=\"page-link\" href=\"";
                // line 195
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                yield "/admin/users/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                </li>
                            ";
            }
            // line 198
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 199
        yield "                            
                        ";
        // line 200
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 201
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        ";
        }
        // line 205
        yield "                            
                        ";
        // line 206
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 207
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 208
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 213
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                    <span aria-hidden=\"true\">Suivant &raquo;</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 218
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">Suivant &raquo;</span>
                            </li>
                        ";
        }
        // line 222
        yield "                    </ul>
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
        return "admin/users.twig";
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
        return array (  538 => 222,  532 => 218,  522 => 213,  515 => 209,  509 => 208,  506 => 207,  504 => 206,  501 => 205,  495 => 201,  493 => 200,  490 => 199,  484 => 198,  474 => 195,  467 => 194,  464 => 193,  460 => 192,  457 => 191,  454 => 190,  448 => 186,  446 => 185,  441 => 183,  438 => 182,  436 => 181,  433 => 180,  427 => 176,  417 => 171,  414 => 170,  412 => 169,  402 => 164,  393 => 157,  387 => 153,  384 => 152,  376 => 149,  367 => 145,  364 => 144,  362 => 143,  359 => 142,  350 => 138,  347 => 137,  345 => 136,  340 => 133,  337 => 132,  328 => 129,  325 => 128,  322 => 127,  313 => 124,  310 => 123,  308 => 122,  301 => 118,  298 => 117,  294 => 115,  291 => 114,  280 => 112,  275 => 111,  273 => 110,  269 => 108,  265 => 106,  263 => 105,  260 => 104,  258 => 103,  255 => 102,  253 => 101,  250 => 100,  248 => 99,  243 => 97,  239 => 96,  236 => 95,  231 => 94,  229 => 93,  209 => 75,  203 => 71,  193 => 66,  186 => 62,  180 => 61,  177 => 60,  175 => 59,  172 => 58,  166 => 54,  164 => 53,  161 => 52,  155 => 51,  145 => 48,  138 => 47,  135 => 46,  131 => 45,  128 => 44,  125 => 43,  119 => 39,  117 => 38,  112 => 36,  109 => 35,  107 => 34,  104 => 33,  98 => 29,  88 => 24,  85 => 23,  83 => 22,  73 => 17,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
<div class=\"container-fluid mt-4\">
    <div class='row'>
        <!-- Menu latéral -->

        <main class=\"col-md-12 ms-sm-auto col-lg-12 px-md-12\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-users me-2\"></i> Liste des utilisateurs</h1>
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ currentPage - 1 }}\" aria-label=\"Previous\">
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/1\">1</a>
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
                                    <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ page }}\">{{ page }}</a>
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ totalPages }}\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">{{ totalPages }}</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ currentPage + 1 }}\" aria-label=\"Next\">
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

            <!-- Tableau des utilisateurs -->
            <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover align-middle\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th class=\"col-1\">ID</th>
                            <th class=\"col-1\">Nom d'utilisateur</th>
                            <th class=\"col-1\">Statut</th>
                            <th class=\"col-5\">Permissions</th>
                            <th class=\"col-2\">Dernière connexion</th>
                            <th class=\"col-2\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% if usersWithPermissions is not empty %}
                            {% for entry in usersWithPermissions %}
                                <tr>
                                    <td>{{ entry.user.getID() }}</td>
                                    <td>{{ entry.user.getUSERNAME() }}</td>
                                    <td style=\"text-align: center;\">
                                        {% if entry.user.getSTATUS() == 'active' %}
                                            <span class=\"badge bg-success\">Actif</span>
                                        {% elseif entry.user.getSTATUS() == 'pending' %}
                                            <span class=\"badge bg-warning text-dark\">En attente</span>
                                        {% elseif entry.user.getSTATUS() == 'inactive' %}
                                            <span class=\"badge bg-secondary\">Inactif</span>
                                        {% elseif entry.user.getSTATUS() == 'banned' %}
                                            <span class=\"badge bg-danger\">Banni</span>
                                        {% endif %}
                                    </td>
                                    <td>
                                        {% if entry.permissions is not empty %}
                                            {% for permission in entry.permissions %}
                                                <span style=\"margin:2px; background-color:{{ config('SITE.color_rank_', permission.getORDERS(), '.value') }};\" class=\"badge\">{{ permission.getFULLNAME() }}</span>
                                            {% endfor %}
                                        {% else %}
                                            <span class=\"badge bg-secondary\">Aucune permission</span>
                                        {% endif %}
                                    </td>
                                    <td>{{ entry.user.getLAST_LOGIN()|date(\"d/m/Y H:i\") }}</td>
                                    <td class=\"text-center\">
                                        <!-- Lien pour bloquer/débloquer l'utilisateur -->
                                        
                                            {% if entry.user.getSTATUS() == 'active' %}
                                                {% if checkPerm('block_user') %}
                                                    <a href=\"{{ base_url }}/admin/block/{{ entry.user.getID() }}\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-lock\"></i> Bannir
                                                {% endif %}
                                            {% else %}
                                                {% if checkPerm('unblock_user') %}
                                                    <a href=\"{{ base_url }}/admin/unblock/{{ entry.user.getID() }}\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-unlock\"></i> Débannir
                                                {% endif %}
                                            {% endif %}
                                        </a>

                                        
                                        {% if checkPerm('manage_permissions') %}
                                            <!-- Lien pour éditer les permissions -->
                                            <a href=\"{{ base_url }}/admin/edit-permissions/{{ entry.user.getID() }}\" class=\"btn btn-warning btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Modifier Permissions
                                            </a>
                                        {% endif %}

                                        {% if checkPerm('view_other_profiles') %}
                                            <!-- Voir le profil de l'utilisateur -->
                                            <a href=\"{{ base_url }}/admin/users/view-profil/{{ entry.user.getID() }}\" class=\"btn btn-success btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Voir le profil
                                            </a>
                                        {% endif %}
                                    </td>
                                </tr>
                            {% endfor %}
                        {% else %}
                            <tr>
                                <td colspan=\"6\" class=\"text-center text-muted\">Aucun utilisateur trouvé</td>
                            </tr>
                        {% endif %}
                    </tbody>
                </table>
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ currentPage - 1 }}\" aria-label=\"Previous\">
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/1\">1</a>
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
                                    <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ page }}\">{{ page }}</a>
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
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ totalPages }}\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">{{ totalPages }}</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"{{ base_url }}/admin/users/{{ currentPage + 1 }}\" aria-label=\"Next\">
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
", "admin/users.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\users.twig");
    }
}
