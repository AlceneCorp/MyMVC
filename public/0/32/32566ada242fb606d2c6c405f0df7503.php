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

/* admin/include/adminMenu.twig */
class __TwigTemplate_db078c5b951c14b2181a6403e5d43214 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!-- Sidebar -->
<nav class=\"col-xs-12 col-sm-12 col-md-2 col-lg-2 d-md-block bg-dark sidebar\" id=\"sidebar\">
\t<div class=\"position-sticky\">
\t\t<h4 class=\"text-left text-white py-5\"></h4>
\t\t<ul class=\"ml-5 nav flex-column text-start\">

\t\t\t";
        // line 7
        if ($this->env->getFunction('checkPerm')->getCallable()("view_site_statistics")) {
            // line 8
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/dashboard\">
\t\t\t\t\t<i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 14
        yield "
\t\t\t";
        // line 15
        if ($this->env->getFunction('checkPerm')->getCallable()("edit_own_profil")) {
            // line 16
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/user/myprofil\">
\t\t\t\t\t<i class=\"fas fa-user me-2\"></i> Mon Profil
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 22
        yield "
\t\t\t";
        // line 23
        if ($this->env->getFunction('checkPerm')->getCallable()("manage_user_groups")) {
            // line 24
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users\">
\t\t\t\t\t<i class=\"fas fa-users me-2\"></i> Utilisateurs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 30
        yield "
\t\t\t";
        // line 31
        if ($this->env->getFunction('checkPerm')->getCallable()("edit_site_settings")) {
            // line 32
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/settings\">
\t\t\t\t\t<i class=\"fas fa-cogs me-2\"></i> Configuration
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 38
        yield "
\t\t\t";
        // line 39
        if ($this->env->getFunction('checkPerm')->getCallable()("manage_error_logs")) {
            // line 40
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/logs\">
\t\t\t\t\t<i class=\"fas fa-book me-2\"></i> Logs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 46
        yield "
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/logout\">
\t\t\t\t\t<i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</nav>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/include/adminMenu.twig";
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
        return array (  131 => 48,  127 => 46,  119 => 41,  116 => 40,  114 => 39,  111 => 38,  103 => 33,  100 => 32,  98 => 31,  95 => 30,  87 => 25,  84 => 24,  82 => 23,  79 => 22,  71 => 17,  68 => 16,  66 => 15,  63 => 14,  55 => 9,  52 => 8,  50 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Sidebar -->
<nav class=\"col-xs-12 col-sm-12 col-md-2 col-lg-2 d-md-block bg-dark sidebar\" id=\"sidebar\">
\t<div class=\"position-sticky\">
\t\t<h4 class=\"text-left text-white py-5\"></h4>
\t\t<ul class=\"ml-5 nav flex-column text-start\">

\t\t\t{% if checkPerm('view_site_statistics') %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/admin/dashboard\">
\t\t\t\t\t<i class=\"fas fa-tachometer-alt me-2\"></i> Dashboard
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('edit_own_profil') %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/user/myprofil\">
\t\t\t\t\t<i class=\"fas fa-user me-2\"></i> Mon Profil
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('manage_user_groups') %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/admin/users\">
\t\t\t\t\t<i class=\"fas fa-users me-2\"></i> Utilisateurs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('edit_site_settings') %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/admin/settings\">
\t\t\t\t\t<i class=\"fas fa-cogs me-2\"></i> Configuration
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('manage_error_logs') %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/admin/logs\">
\t\t\t\t\t<i class=\"fas fa-book me-2\"></i> Logs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t<li class=\"nav-item\">
\t\t\t\t<a class=\"nav-link text-white\" href=\"{{base_url}}/logout\">
\t\t\t\t\t<i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</nav>
", "admin/include/adminMenu.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\include\\adminMenu.twig");
    }
}
