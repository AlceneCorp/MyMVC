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
<nav class=\"col-12 col-sm-12 col-md-2 col-lg-2 d-md-block bg-dark sidebar\" id=\"sidebar\">
\t<div class=\"position-sticky\">
\t\t<h4 class=\"text-center text-white py-4 fs-4\">Menu</h4>
\t\t<ul class=\"nav flex-column\">

\t\t\t";
        // line 7
        if ($this->env->getFunction('checkPerm')->getCallable()("view_site_statistics")) {
            // line 8
            yield "\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/dashboard\">
\t\t\t\t\t<i class=\"fas fa-tachometer-alt me-3 fs-4\"></i>
\t\t\t\t\tDashboard
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 15
        yield "
\t\t\t";
        // line 16
        if ($this->env->getFunction('checkPerm')->getCallable()("edit_own_profil")) {
            // line 17
            yield "\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/user/myprofil\">
\t\t\t\t\t<i class=\"fas fa-user me-3 fs-4\"></i>
\t\t\t\t\tMon Profil
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 24
        yield "
\t\t\t";
        // line 25
        if ($this->env->getFunction('checkPerm')->getCallable()("manage_user_groups")) {
            // line 26
            yield "\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/users\">
\t\t\t\t\t<i class=\"fas fa-users me-3 fs-4\"></i>
\t\t\t\t\tUtilisateurs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 33
        yield "
\t\t\t";
        // line 34
        if ($this->env->getFunction('checkPerm')->getCallable()("edit_site_settings")) {
            // line 35
            yield "\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/settings\">
\t\t\t\t\t<i class=\"fas fa-cogs me-3 fs-4\"></i>
\t\t\t\t\tConfiguration
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 42
        yield "
\t\t\t";
        // line 43
        if ($this->env->getFunction('checkPerm')->getCallable()("manage_error_logs")) {
            // line 44
            yield "\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/admin/logs\">
\t\t\t\t\t<i class=\"fas fa-book me-3 fs-4\"></i>
\t\t\t\t\tLogs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        }
        // line 51
        yield "
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/logout\">
\t\t\t\t\t<i class=\"fas fa-sign-out-alt me-3 fs-4\"></i>
\t\t\t\t\tDéconnexion
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
        return array (  136 => 53,  132 => 51,  123 => 45,  120 => 44,  118 => 43,  115 => 42,  106 => 36,  103 => 35,  101 => 34,  98 => 33,  89 => 27,  86 => 26,  84 => 25,  81 => 24,  72 => 18,  69 => 17,  67 => 16,  64 => 15,  55 => 9,  52 => 8,  50 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Sidebar -->
<nav class=\"col-12 col-sm-12 col-md-2 col-lg-2 d-md-block bg-dark sidebar\" id=\"sidebar\">
\t<div class=\"position-sticky\">
\t\t<h4 class=\"text-center text-white py-4 fs-4\">Menu</h4>
\t\t<ul class=\"nav flex-column\">

\t\t\t{% if checkPerm('view_site_statistics') %}
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/admin/dashboard\">
\t\t\t\t\t<i class=\"fas fa-tachometer-alt me-3 fs-4\"></i>
\t\t\t\t\tDashboard
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('edit_own_profil') %}
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/user/myprofil\">
\t\t\t\t\t<i class=\"fas fa-user me-3 fs-4\"></i>
\t\t\t\t\tMon Profil
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('manage_user_groups') %}
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/admin/users\">
\t\t\t\t\t<i class=\"fas fa-users me-3 fs-4\"></i>
\t\t\t\t\tUtilisateurs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('edit_site_settings') %}
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/admin/settings\">
\t\t\t\t\t<i class=\"fas fa-cogs me-3 fs-4\"></i>
\t\t\t\t\tConfiguration
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t{% if checkPerm('manage_error_logs') %}
\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/admin/logs\">
\t\t\t\t\t<i class=\"fas fa-book me-3 fs-4\"></i>
\t\t\t\t\tLogs
\t\t\t\t</a>
\t\t\t</li>
\t\t\t{% endif %}

\t\t\t<li class=\"nav-item mb-3\">
\t\t\t\t<a class=\"nav-link text-light d-flex align-items-center p-3 rounded-3 hover-bg-dark\" href=\"{{base_url}}/logout\">
\t\t\t\t\t<i class=\"fas fa-sign-out-alt me-3 fs-4\"></i>
\t\t\t\t\tDéconnexion
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</nav>

", "admin/include/adminMenu.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\include\\adminMenu.twig");
    }
}
