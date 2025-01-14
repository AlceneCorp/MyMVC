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

/* login/register.twig */
class __TwigTemplate_e6729e4905c40412ef58c1f0a94cd745 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "login/register.twig", 1);
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
        <div class=\"card-header bg-info text-white text-center py-4\" style=\"border-top-left-radius: 15px; border-top-right-radius: 15px;\">
            <h4 class=\"mb-0\"><i class=\"fas fa-user-plus me-2\"></i> Inscription</h4>
            <p class=\"mb-0\">Créez votre compte pour commencer</p>
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
        yield "            ";
        if (($context["success"] ?? null)) {
            // line 19
            yield "                <div class=\"alert alert-success text-center mb-4\">
                    <i class=\"fas fa-exclamation-triangle me-2\"></i> ";
            // line 20
            yield ($context["success"] ?? null);
            yield "
                </div>
            ";
        }
        // line 23
        yield "            <form method=\"POST\">
                <!-- Username Input -->
                <div class=\"mb-3\">
                    <label for=\"username\" class=\"form-label\">Nom d'utilisateur</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-user\"></i>
                        </span>
                        <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Entrez un nom d'utilisateur\" required>
                    </div>
                </div>
                <!-- Email Input -->
                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Adresse e-mail</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-envelope\"></i>
                        </span>
                        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Entrez votre adresse e-mail\" required>
                    </div>
                </div>
                <!-- Password Input -->
                <div class=\"mb-3\">
                    <label for=\"password\" class=\"form-label\">Mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Entrez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Confirm Password Input -->
                <div class=\"mb-3\">
                    <label for=\"confirm_password\" class=\"form-label\">Confirmez le mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"confirm_password\" name=\"confirm_password\" placeholder=\"Confirmez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Submit Button -->
                <button type=\"submit\" class=\"btn btn-success w-100 py-2\">
                    <i class=\"fas fa-user-plus me-2\"></i> S'inscrire
                </button>
            </form>
        </div>
        <!-- Card Footer -->
        <div class=\"card-footer text-center bg-light py-3\" style=\"border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;\">
            <small class=\"text-muted\">Vous avez déjà un compte ?</small>
            <a href=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/login\" class=\"text-decoration-none text-primary fw-bold ms-1\">
                Connectez-vous
            </a>
        </div>
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
        return "login/register.twig";
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
        return array (  144 => 73,  92 => 23,  86 => 20,  83 => 19,  80 => 18,  74 => 15,  71 => 14,  69 => 13,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block content %}
<div class=\"mt-5 d-flex align-items-center justify-content-center\">
    <div class=\"card shadow-lg\" style=\"width: 100%; max-width: 420px; border-radius: 15px;\">
        <!-- Card Header -->
        <div class=\"card-header bg-info text-white text-center py-4\" style=\"border-top-left-radius: 15px; border-top-right-radius: 15px;\">
            <h4 class=\"mb-0\"><i class=\"fas fa-user-plus me-2\"></i> Inscription</h4>
            <p class=\"mb-0\">Créez votre compte pour commencer</p>
        </div>
        <!-- Card Body -->
        <div class=\"card-body p-4\">
            {% if error %}
                <div class=\"alert alert-danger text-center mb-4\">
                    <i class=\"fas fa-exclamation-triangle me-2\"></i> {{ error }}
                </div>
            {% endif %}
            {% if success %}
                <div class=\"alert alert-success text-center mb-4\">
                    <i class=\"fas fa-exclamation-triangle me-2\"></i> {{ success | raw }}
                </div>
            {% endif %}
            <form method=\"POST\">
                <!-- Username Input -->
                <div class=\"mb-3\">
                    <label for=\"username\" class=\"form-label\">Nom d'utilisateur</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-user\"></i>
                        </span>
                        <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Entrez un nom d'utilisateur\" required>
                    </div>
                </div>
                <!-- Email Input -->
                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Adresse e-mail</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-envelope\"></i>
                        </span>
                        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Entrez votre adresse e-mail\" required>
                    </div>
                </div>
                <!-- Password Input -->
                <div class=\"mb-3\">
                    <label for=\"password\" class=\"form-label\">Mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Entrez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Confirm Password Input -->
                <div class=\"mb-3\">
                    <label for=\"confirm_password\" class=\"form-label\">Confirmez le mot de passe</label>
                    <div class=\"input-group\">
                        <span class=\"input-group-text bg-info text-white\">
                            <i class=\"fas fa-lock\"></i>
                        </span>
                        <input type=\"password\" class=\"form-control\" id=\"confirm_password\" name=\"confirm_password\" placeholder=\"Confirmez votre mot de passe\" required>
                    </div>
                </div>
                <!-- Submit Button -->
                <button type=\"submit\" class=\"btn btn-success w-100 py-2\">
                    <i class=\"fas fa-user-plus me-2\"></i> S'inscrire
                </button>
            </form>
        </div>
        <!-- Card Footer -->
        <div class=\"card-footer text-center bg-light py-3\" style=\"border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;\">
            <small class=\"text-muted\">Vous avez déjà un compte ?</small>
            <a href=\"{{ base_url }}/login\" class=\"text-decoration-none text-primary fw-bold ms-1\">
                Connectez-vous
            </a>
        </div>
    </div>
</div>
{% endblock %}
", "login/register.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\login\\register.twig");
    }
}
