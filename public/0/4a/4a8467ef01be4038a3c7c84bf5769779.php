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

/* admin/users_permissions.twig */
class __TwigTemplate_0aa4374c03b51e91df6e6f558d486949 extends Template
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
            'style' => [$this, 'block_style'],
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
        $this->parent = $this->loadTemplate("base.twig", "admin/users_permissions.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("css/userperm.css"), "html", null, true);
        yield "\">
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "<div class=\"container-fluid mt-4\">
    <div class=\"row\">

        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-users me-2\"></i> Gestion des Permissions des Utilisateurs
            </div>

            <!-- Liste des utilisateurs -->
            <div class=\"row\">
                ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["usersWithPermissions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 20
            yield "                    <div class=\"col-lg-12\">
                        <div class=\"card shadow-sm mb-10\">
                            <div class=\"card-header bg-dark text-white d-flex align-items-center justify-content-between\">
                                <div>
                                    <i class=\"fas fa-user me-2\"></i>";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 24), "getUSERNAME", [], "method", false, false, false, 24), "html", null, true);
            yield "
                                </div>
                                <span class=\"badge bg-primary\">ID: ";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "user", [], "any", false, false, false, 26), "getID", [], "method", false, false, false, 26), "html", null, true);
            yield "</span>
                            </div>
                            <div class=\"card-body\">

                                <!-- Ligne de séparation -->
                                <hr class=\"my-3\">

                                <form method=\"POST\">
                                    <div class=\"row\">
                                        ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["allPermissions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                // line 36
                yield "                                            <div class=\"col-md-3 col-xs-12 mb-3\">
                                                <div class=\"custom-checkbox p-3 rounded shadow-sm position-relative\" style=\"background-color:";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.color_rank_", CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getORDERS", [], "method", false, false, false, 37), ".value"), "html", null, true);
                yield ";\">
                                                    <input 
                                                        id=\"permission-";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getID", [], "method", false, false, false, 39), "html", null, true);
                yield "\" 
                                                        class=\"custom-checkbox-input\" 
                                                        type=\"checkbox\" 
                                                        name=\"permissions[]\" 
                                                        value=\"";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getID", [], "method", false, false, false, 43), "html", null, true);
                yield "\" 
                                                        ";
                // line 44
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getID", [], "method", false, false, false, 44), CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "permissionsIds", [], "any", false, false, false, 44))) {
                    yield " checked ";
                }
                yield ">

                                                    <label for=\"permission-";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getID", [], "method", false, false, false, 46), "html", null, true);
                yield "\" class=\"custom-checkbox-label\">
                                                        ";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["permission"], "getFULLNAME", [], "method", false, false, false, 47), "html", null, true);
                yield "
                                                    </label>
                                                </div>
                                            </div>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['permission'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            yield "                                    </div>
                                    <button type=\"submit\" class=\"btn btn-primary w-100 mt-3\">
                                        <i class=\"fas fa-save me-1\"></i> Mettre à jour
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['entry'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "            </div>
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
        return "admin/users_permissions.twig";
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
        return array (  174 => 61,  160 => 52,  149 => 47,  145 => 46,  138 => 44,  134 => 43,  127 => 39,  122 => 37,  119 => 36,  115 => 35,  103 => 26,  98 => 24,  92 => 20,  88 => 19,  75 => 8,  68 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block style %}
<link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/userperm.css') }}\">
{% endblock %}

{% block content %}
<div class=\"container-fluid mt-4\">
    <div class=\"row\">

        <main class=\"col-md-12 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-users me-2\"></i> Gestion des Permissions des Utilisateurs
            </div>

            <!-- Liste des utilisateurs -->
            <div class=\"row\">
                {% for entry in usersWithPermissions %}
                    <div class=\"col-lg-12\">
                        <div class=\"card shadow-sm mb-10\">
                            <div class=\"card-header bg-dark text-white d-flex align-items-center justify-content-between\">
                                <div>
                                    <i class=\"fas fa-user me-2\"></i>{{ entry.user.getUSERNAME() }}
                                </div>
                                <span class=\"badge bg-primary\">ID: {{ entry.user.getID() }}</span>
                            </div>
                            <div class=\"card-body\">

                                <!-- Ligne de séparation -->
                                <hr class=\"my-3\">

                                <form method=\"POST\">
                                    <div class=\"row\">
                                        {% for permission in allPermissions %}
                                            <div class=\"col-md-3 col-xs-12 mb-3\">
                                                <div class=\"custom-checkbox p-3 rounded shadow-sm position-relative\" style=\"background-color:{{ config('SITE.color_rank_', permission.getORDERS(), '.value') }};\">
                                                    <input 
                                                        id=\"permission-{{ permission.getID() }}\" 
                                                        class=\"custom-checkbox-input\" 
                                                        type=\"checkbox\" 
                                                        name=\"permissions[]\" 
                                                        value=\"{{ permission.getID() }}\" 
                                                        {% if permission.getID() in entry.permissionsIds %} checked {% endif %}>

                                                    <label for=\"permission-{{ permission.getID() }}\" class=\"custom-checkbox-label\">
                                                        {{ permission.getFULLNAME() }}
                                                    </label>
                                                </div>
                                            </div>
                                        {% endfor %}
                                    </div>
                                    <button type=\"submit\" class=\"btn btn-primary w-100 mt-3\">
                                        <i class=\"fas fa-save me-1\"></i> Mettre à jour
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        </main>
    </div>
</div>
{% endblock %}
", "admin/users_permissions.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\users_permissions.twig");
    }
}
