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

/* error/error.twig */
class __TwigTemplate_ecf3f0d44747c9ab7dba129c679c1684 extends Template
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
            'title' => [$this, 'block_title'],
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
        $this->parent = $this->loadTemplate("base.twig", "error/error.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Erreur";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"row\">
    <div class=\"col-md-6 mt-5 offset-3\">
        <div class=\"text-center p-5 shadow-lg rounded bg-white\" 
             style=\"box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);  animation: fadeIn 1s;\">
            <!-- Icône de l'erreur -->
            <h1 class=\"display-1 text-danger mb-4 animate__animated animate__shakeX\">
                <i class=\"fa fa-exclamation-triangle\"></i>
            </h1>
            <!-- Message principal -->
            <h2 class=\"display-5 fw-bold text-dark mb-3\">Oups, une erreur est survenue !</h2>
            <p class=\"lead text-muted mb-4\">
                Nous avons rencontré un problème en traitant votre requête.
            </p>
            <p class=\"text-danger fw-bold fs-5 mb-3\">
                Code d'erreur : <strong>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error_code"] ?? null), "html", null, true);
        yield "</strong>
            </p>

            <!-- Message d'information -->
            <p class=\"text-muted mb-4\">
                ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("error_message", $context)) ? (Twig\Extension\CoreExtension::default(($context["error_message"] ?? null), "Nous travaillons activement pour résoudre ce problème. Merci de votre patience.")) : ("Nous travaillons activement pour résoudre ce problème. Merci de votre patience.")), "html", null, true);
        yield "
            </p>

            <!-- Boutons d'action -->
            <div class=\"d-flex justify-content-center gap-3 mt-3\">
                <a href=\"/MyMVC/\" class=\"btn btn-primary btn-lg px-4 py-2 hvr-float-shadow\">
                    <i class=\"fa fa-home\"></i> Retour à l'accueil
                </a>
                <a href=\"javascript:history.back()\" class=\"btn btn-secondary btn-lg px-4 py-2 hvr-float-shadow\">
                    <i class=\"fa fa-arrow-left\"></i> Revenir en arrière
                </a>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 43
        yield "<script>
    // Animation de l'icône principale
    gsap.from(\".fa-exclamation-triangle\", { opacity: 0, rotation: 360, scale: 0, duration: 1.5 });

    // Animation d'entrée du conteneur
    gsap.from(\".text-center\", { y: 50, opacity: 0, duration: 1 });

    // Animation pour secouer le conteneur en cas de clic (exemple)
    document.querySelectorAll(\"a\").forEach(button => {
        button.addEventListener(\"click\", () => {
            gsap.to(\".text-center\", { x: 10, repeat: 5, yoyo: true, duration: 0.1 });
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
        return "error/error.twig";
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
        return array (  123 => 43,  116 => 42,  95 => 25,  87 => 20,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Erreur{% endblock %}

{% block content %}
<div class=\"row\">
    <div class=\"col-md-6 mt-5 offset-3\">
        <div class=\"text-center p-5 shadow-lg rounded bg-white\" 
             style=\"box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);  animation: fadeIn 1s;\">
            <!-- Icône de l'erreur -->
            <h1 class=\"display-1 text-danger mb-4 animate__animated animate__shakeX\">
                <i class=\"fa fa-exclamation-triangle\"></i>
            </h1>
            <!-- Message principal -->
            <h2 class=\"display-5 fw-bold text-dark mb-3\">Oups, une erreur est survenue !</h2>
            <p class=\"lead text-muted mb-4\">
                Nous avons rencontré un problème en traitant votre requête.
            </p>
            <p class=\"text-danger fw-bold fs-5 mb-3\">
                Code d'erreur : <strong>{{ error_code }}</strong>
            </p>

            <!-- Message d'information -->
            <p class=\"text-muted mb-4\">
                {{ error_message | default(\"Nous travaillons activement pour résoudre ce problème. Merci de votre patience.\") }}
            </p>

            <!-- Boutons d'action -->
            <div class=\"d-flex justify-content-center gap-3 mt-3\">
                <a href=\"/MyMVC/\" class=\"btn btn-primary btn-lg px-4 py-2 hvr-float-shadow\">
                    <i class=\"fa fa-home\"></i> Retour à l'accueil
                </a>
                <a href=\"javascript:history.back()\" class=\"btn btn-secondary btn-lg px-4 py-2 hvr-float-shadow\">
                    <i class=\"fa fa-arrow-left\"></i> Revenir en arrière
                </a>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block jquery %}
<script>
    // Animation de l'icône principale
    gsap.from(\".fa-exclamation-triangle\", { opacity: 0, rotation: 360, scale: 0, duration: 1.5 });

    // Animation d'entrée du conteneur
    gsap.from(\".text-center\", { y: 50, opacity: 0, duration: 1 });

    // Animation pour secouer le conteneur en cas de clic (exemple)
    document.querySelectorAll(\"a\").forEach(button => {
        button.addEventListener(\"click\", () => {
            gsap.to(\".text-center\", { x: 10, repeat: 5, yoyo: true, duration: 0.1 });
        });
    });
</script>
{% endblock %}
", "error/error.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\error\\error.twig");
    }
}
