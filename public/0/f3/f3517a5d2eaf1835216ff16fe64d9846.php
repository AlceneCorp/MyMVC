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
        ";
        // line 7
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "admin/users.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-users me-2\"></i> Liste des utilisateurs</h1>
            </div>

            <!-- Pagination -->
            <div class=\"d-flex justify-content-between align-items-center mt-4\">
                <div>
                    <span>Page ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                </div>

                <nav aria-label=\"Pagination\">
                    <ul class=\"pagination\">
                        ";
        // line 23
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 24
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                    <span aria-hidden=\"true\">&laquo; Précédent</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 30
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">&laquo; Précédent</span>
                            </li>
                        ";
        }
        // line 34
        yield "                            
                        ";
        // line 35
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 36
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/1\">1</a>
                            </li>
                            ";
            // line 39
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 40
                yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
            }
            // line 44
            yield "                        ";
        }
        // line 45
        yield "                            
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 47
            yield "                            ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 48
                yield "                                <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                    <a class=\"page-link\" href=\"";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                yield "/admin/users/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                </li>
                            ";
            }
            // line 52
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        yield "                            
                        ";
        // line 54
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 55
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        ";
        }
        // line 59
        yield "                            
                        ";
        // line 60
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 61
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                    <span aria-hidden=\"true\">Suivant &raquo;</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 72
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">Suivant &raquo;</span>
                            </li>
                        ";
        }
        // line 76
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
        // line 94
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["usersWithPermissions"] ?? null))) {
            // line 95
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["usersWithPermissions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 96
                yield "                                <tr>
                                    <td>";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 97), "getID", [], "method", false, false, false, 97), "html", null, true);
                yield "</td>
                                    <td>";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 98), "getUSERNAME", [], "method", false, false, false, 98), "html", null, true);
                yield "</td>
                                    <td style=\"text-align: center;\">
                                        ";
                // line 100
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 100), "getSTATUS", [], "method", false, false, false, 100) == "active")) {
                    // line 101
                    yield "                                            <span class=\"badge bg-success\">Actif</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 102
$context["entry"], "user", [], "any", false, false, false, 102), "getSTATUS", [], "method", false, false, false, 102) == "pending")) {
                    // line 103
                    yield "                                            <span class=\"badge bg-warning text-dark\">En attente</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 104
$context["entry"], "user", [], "any", false, false, false, 104), "getSTATUS", [], "method", false, false, false, 104) == "inactive")) {
                    // line 105
                    yield "                                            <span class=\"badge bg-secondary\">Inactif</span>
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 106
$context["entry"], "user", [], "any", false, false, false, 106), "getSTATUS", [], "method", false, false, false, 106) == "banned")) {
                    // line 107
                    yield "                                            <span class=\"badge bg-danger\">Banni</span>
                                        ";
                }
                // line 109
                yield "                                    </td>
                                    <td>
                                        ";
                // line 111
                if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "permissions", [], "any", false, false, false, 111))) {
                    // line 112
                    yield "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "permissions", [], "any", false, false, false, 112));
                    foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                        // line 113
                        yield "                                                <span style=\"margin:2px; background-color:";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.color_rank_", CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getORDERS", [], "method", false, false, false, 113), ".value"), "html", null, true);
                        yield ";\" class=\"badge\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getFULLNAME", [], "method", false, false, false, 113), "html", null, true);
                        yield "</span>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['permission'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 115
                    yield "                                        ";
                } else {
                    // line 116
                    yield "                                            <span class=\"badge bg-secondary\">Aucune permission</span>
                                        ";
                }
                // line 118
                yield "                                    </td>
                                    <td>";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 119), "getLAST_LOGIN", [], "method", false, false, false, 119), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                                    <td class=\"text-center\">
                                        <!-- Lien pour bloquer/débloquer l'utilisateur -->
                                        
                                            ";
                // line 123
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 123), "getSTATUS", [], "method", false, false, false, 123) == "active")) {
                    // line 124
                    yield "                                                ";
                    if ($this->env->getFunction('checkPerm')->getCallable()("block_user")) {
                        // line 125
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                        yield "/admin/block/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 125), "getID", [], "method", false, false, false, 125), "html", null, true);
                        yield "\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-lock\"></i> Bannir
                                                ";
                    }
                    // line 128
                    yield "                                            ";
                } else {
                    // line 129
                    yield "                                                ";
                    if ($this->env->getFunction('checkPerm')->getCallable()("unblock_user")) {
                        // line 130
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                        yield "/admin/unblock/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 130), "getID", [], "method", false, false, false, 130), "html", null, true);
                        yield "\" class=\"btn btn-danger btn-sm mb-1\">
                                                    <i class=\"fas fa-unlock\"></i> Débannir
                                                ";
                    }
                    // line 133
                    yield "                                            ";
                }
                // line 134
                yield "                                        </a>

                                        
                                        ";
                // line 137
                if ($this->env->getFunction('checkPerm')->getCallable()("manage_permissions")) {
                    // line 138
                    yield "                                            <!-- Lien pour éditer les permissions -->
                                            <a href=\"";
                    // line 139
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                    yield "/admin/edit-permissions/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 139), "getID", [], "method", false, false, false, 139), "html", null, true);
                    yield "\" class=\"btn btn-warning btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Modifier Permissions
                                            </a>
                                        ";
                }
                // line 143
                yield "
                                        ";
                // line 144
                if ($this->env->getFunction('checkPerm')->getCallable()("view_other_profiles")) {
                    // line 145
                    yield "                                            <!-- Voir le profil de l'utilisateur -->
                                            <a href=\"";
                    // line 146
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                    yield "/admin/users/view-profil/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 146), "getID", [], "method", false, false, false, 146), "html", null, true);
                    yield "\" class=\"btn btn-success btn-sm mb-1\">
                                                <i class=\"fas fa-edit\"></i> Voir le profil
                                            </a>
                                        ";
                }
                // line 150
                yield "                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['entry'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 153
            yield "                        ";
        } else {
            // line 154
            yield "                            <tr>
                                <td colspan=\"6\" class=\"text-center text-muted\">Aucun utilisateur trouvé</td>
                            </tr>
                        ";
        }
        // line 158
        yield "                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class=\"d-flex justify-content-between align-items-center mt-4\">
                <div>
                    <span>Page ";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentPage"] ?? null), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
        yield "</span>
                </div>

                <nav aria-label=\"Pagination\">
                    <ul class=\"pagination\">
                        ";
        // line 170
        if ((($context["currentPage"] ?? null) > 1)) {
            // line 171
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) - 1), "html", null, true);
            yield "\" aria-label=\"Previous\">
                                    <span aria-hidden=\"true\">&laquo; Précédent</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 177
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">&laquo; Précédent</span>
                            </li>
                        ";
        }
        // line 181
        yield "                            
                        ";
        // line 182
        if ((($context["currentPage"] ?? null) > 2)) {
            // line 183
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 184
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/1\">1</a>
                            </li>
                            ";
            // line 186
            if ((($context["currentPage"] ?? null) > 3)) {
                // line 187
                yield "                                <li class=\"page-item disabled\">
                                    <span class=\"page-link\">...</span>
                                </li>
                            ";
            }
            // line 191
            yield "                        ";
        }
        // line 192
        yield "                            
                        ";
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((($context["currentPage"] ?? null) - 1), (($context["currentPage"] ?? null) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 194
            yield "                            ";
            if ((($context["page"] > 0) && ($context["page"] <= ($context["totalPages"] ?? null)))) {
                // line 195
                yield "                                <li class=\"page-item ";
                if (($context["page"] == ($context["currentPage"] ?? null))) {
                    yield "active";
                }
                yield "\">
                                    <a class=\"page-link\" href=\"";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
                yield "/admin/users/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                                </li>
                            ";
            }
            // line 199
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        yield "                            
                        ";
        // line 201
        if ((($context["currentPage"] ?? null) < (($context["totalPages"] ?? null) - 1))) {
            // line 202
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        ";
        }
        // line 206
        yield "                            
                        ";
        // line 207
        if ((($context["currentPage"] ?? null) < ($context["totalPages"] ?? null))) {
            // line 208
            yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "\" aria-label=\"Last\">
                                    <span aria-hidden=\"true\">";
            // line 210
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalPages"] ?? null), "html", null, true);
            yield "</span>
                                </a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
            // line 214
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["currentPage"] ?? null) + 1), "html", null, true);
            yield "\" aria-label=\"Next\">
                                    <span aria-hidden=\"true\">Suivant &raquo;</span>
                                </a>
                            </li>
                        ";
        } else {
            // line 219
            yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">Suivant &raquo;</span>
                            </li>
                        ";
        }
        // line 223
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
        return array (  542 => 223,  536 => 219,  526 => 214,  519 => 210,  513 => 209,  510 => 208,  508 => 207,  505 => 206,  499 => 202,  497 => 201,  494 => 200,  488 => 199,  478 => 196,  471 => 195,  468 => 194,  464 => 193,  461 => 192,  458 => 191,  452 => 187,  450 => 186,  445 => 184,  442 => 183,  440 => 182,  437 => 181,  431 => 177,  421 => 172,  418 => 171,  416 => 170,  406 => 165,  397 => 158,  391 => 154,  388 => 153,  380 => 150,  371 => 146,  368 => 145,  366 => 144,  363 => 143,  354 => 139,  351 => 138,  349 => 137,  344 => 134,  341 => 133,  332 => 130,  329 => 129,  326 => 128,  317 => 125,  314 => 124,  312 => 123,  305 => 119,  302 => 118,  298 => 116,  295 => 115,  284 => 113,  279 => 112,  277 => 111,  273 => 109,  269 => 107,  267 => 106,  264 => 105,  262 => 104,  259 => 103,  257 => 102,  254 => 101,  252 => 100,  247 => 98,  243 => 97,  240 => 96,  235 => 95,  233 => 94,  213 => 76,  207 => 72,  197 => 67,  190 => 63,  184 => 62,  181 => 61,  179 => 60,  176 => 59,  170 => 55,  168 => 54,  165 => 53,  159 => 52,  149 => 49,  142 => 48,  139 => 47,  135 => 46,  132 => 45,  129 => 44,  123 => 40,  121 => 39,  116 => 37,  113 => 36,  111 => 35,  108 => 34,  102 => 30,  92 => 25,  89 => 24,  87 => 23,  77 => 18,  65 => 8,  63 => 7,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block content %}
<div class=\"container-fluid mt-4\">
    <div class='row'>
        <!-- Menu latéral -->
        {% include 'admin/include/adminMenu.twig' %}

        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
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
