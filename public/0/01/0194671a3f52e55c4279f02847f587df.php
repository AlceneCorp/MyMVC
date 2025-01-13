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

/* login/login.twig */
class __TwigTemplate_7ae53f6c99245dfcd4ccb05c4f575ef6 extends Template
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
            'style' => [$this, 'block_style'],
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
        $this->parent = $this->loadTemplate("base.twig", "login/login.twig", 1);
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
        yield "<div class=\"mt-5 d-flex align-items-center justify-content-center\">
    <div class=\"card shadow-lg\" style=\"width: 100%; max-width: 420px; border-radius: 15px;\">
        <!-- Card Header -->
        <div class=\"card-header text-white text-center py-4\" style=\"background-color:";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield "; border-top-left-radius: 15px; border-top-right-radius: 15px;\">
            <h4 class=\"mb-0\"><i class=\"fas fa-user-circle me-2\"></i> Bienvenue !</h4>
            <p class=\"mb-0\">Connectez-vous pour accéder à votre compte</p>
        </div>
        <!-- Card Body -->
        <div class=\"card-body p-4\">
            ";
        // line 13
        if (($context["error"] ?? null)) {
            // line 14
            yield "                <div class=\"alert alert-danger text-center mb-4\">
                    <i class=\"fas fa-exclamation-triangle me-2\"></i> ";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 18
        yield "            <form method=\"POST\">
                <!-- Email Input -->
                <div class=\"mb-3\">
                    <label for=\"login\" class=\"form-label\">Identifiant</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text text-white\" style=\"background-color:";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";\">
                            <i class=\"fas fa-user\"></i>
                        </span>
                        <input type=\"login\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"Entrez votre identifiant\" required>
                    </div>
                </div>
                <!-- Password Input -->
                <div class=\"mb-3\">
                    <label for=\"password\" class=\"form-label\">Mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text text-white\" style=\"background-color:";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Entrez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Forgot Password Link -->
                <div class=\"mb-3 text-end\">
                    <a href=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/forgot-password\" class=\"text-decoration-none text-primary small\">
                        Mot de passe oublié ?
                    </a>
                </div>
                <!-- Submit Button -->
                <button type=\"submit\" class=\"btn btn-primary w-100 py-2\" style=\"background-color:";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";\">
                    <i class=\"fas fa-sign-in-alt me-2\"></i> Se connecter
                </button>
            </form>
        </div>
        <!-- Card Footer -->
        <div class=\"card-footer text-center bg-light py-3\" style=\"border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;\">
            <small class=\"text-muted\">Pas encore de compte ?</small>
            <a href=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/register\" class=\"text-decoration-none text-primary fw-bold ms-1\">
                Inscrivez-vous
            </a>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 63
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("css/login.css"), "html", null, true);
        yield "\">
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "login/login.twig";
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
        return array (  153 => 63,  146 => 62,  134 => 54,  123 => 46,  115 => 41,  104 => 33,  91 => 23,  84 => 18,  78 => 15,  75 => 14,  73 => 13,  64 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block content %}
<div class=\"mt-5 d-flex align-items-center justify-content-center\">
    <div class=\"card shadow-lg\" style=\"width: 100%; max-width: 420px; border-radius: 15px;\">
        <!-- Card Header -->
        <div class=\"card-header text-white text-center py-4\" style=\"background-color:{{ config('SITE.site_color_1.value') }}; border-top-left-radius: 15px; border-top-right-radius: 15px;\">
            <h4 class=\"mb-0\"><i class=\"fas fa-user-circle me-2\"></i> Bienvenue !</h4>
            <p class=\"mb-0\">Connectez-vous pour accéder à votre compte</p>
        </div>
        <!-- Card Body -->
        <div class=\"card-body p-4\">
            {% if error %}
                <div class=\"alert alert-danger text-center mb-4\">
                    <i class=\"fas fa-exclamation-triangle me-2\"></i> {{ error }}
                </div>
            {% endif %}
            <form method=\"POST\">
                <!-- Email Input -->
                <div class=\"mb-3\">
                    <label for=\"login\" class=\"form-label\">Identifiant</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text text-white\" style=\"background-color:{{ config('SITE.site_color_1.value') }};\">
                            <i class=\"fas fa-user\"></i>
                        </span>
                        <input type=\"login\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"Entrez votre identifiant\" required>
                    </div>
                </div>
                <!-- Password Input -->
                <div class=\"mb-3\">
                    <label for=\"password\" class=\"form-label\">Mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text text-white\" style=\"background-color:{{ config('SITE.site_color_1.value') }};\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Entrez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Forgot Password Link -->
                <div class=\"mb-3 text-end\">
                    <a href=\"{{ base_url }}/forgot-password\" class=\"text-decoration-none text-primary small\">
                        Mot de passe oublié ?
                    </a>
                </div>
                <!-- Submit Button -->
                <button type=\"submit\" class=\"btn btn-primary w-100 py-2\" style=\"background-color:{{ config('SITE.site_color_1.value') }};\">
                    <i class=\"fas fa-sign-in-alt me-2\"></i> Se connecter
                </button>
            </form>
        </div>
        <!-- Card Footer -->
        <div class=\"card-footer text-center bg-light py-3\" style=\"border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;\">
            <small class=\"text-muted\">Pas encore de compte ?</small>
            <a href=\"{{ base_url }}/register\" class=\"text-decoration-none text-primary fw-bold ms-1\">
                Inscrivez-vous
            </a>
        </div>
    </div>
</div>
{% endblock %}

{% block style %}
<link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/login.css') }}\">
{% endblock %}
", "login/login.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\login\\login.twig");
    }
}
