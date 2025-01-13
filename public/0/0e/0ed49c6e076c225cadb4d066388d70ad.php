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

/* home/home.twig */
class __TwigTemplate_5cbde91da4ec337ffb5ee14f79065af1 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "home/home.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Bienvenue sur My Innovative Website";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("css/home.css"), "html", null, true);
        yield "\">
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "<!-- Hero Section -->
<section class=\"features\">
    <div data-aos=\"zoom-in\">
        <h1>Bienvenue dans l'innovation</h1>
        <p>Solutions créatives pour relever vos défis numériques</p>
        <a href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/features\" class=\"btn btn-primary hvr-float-shadow\">Explorer nos services</a>
    </div>
</section>

<!-- Features Section -->
<section id=\"features\" class=\"features mt-4\">
    <div class=\"row\">
        <!-- Feature 1 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-lightbulb\"></i>
                <h3>Idées Innovantes</h3>
                <p>Nous transformons vos idées en réalités grâce à des solutions technologiques.</p>
            </div>
        </div>
        <!-- Feature 2 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-cogs\"></i>
                <h3>Technologies Avancées</h3>
                <p>Des outils de pointe pour optimiser vos performances.</p>
            </div>
        </div>
        <!-- Feature 3 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-users\"></i>
                <h3>Service Client</h3>
                <p>Un support dédié pour accompagner vos projets.</p>
            </div>
        </div>
        <!-- Feature 4 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-shield-alt\"></i>
                <h3>Sécurité Renforcée</h3>
                <p>La sécurité est au cœur de notre développement pour protéger vos données.</p>
            </div>
        </div>
        <!-- Feature 5 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-chart-line\"></i>
                <h3>Performance Optimisée</h3>
                <p>Nous assurons un fonctionnement rapide et fluide de vos applications.</p>
            </div>
        </div>
        <!-- Feature 6 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-cloud\"></i>
                <h3>Solutions Cloud</h3>
                <p>Accédez à vos données en toute sécurité, où que vous soyez.</p>
            </div>
        </div>
        <!-- Feature 7 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-mobile-alt\"></i>
                <h3>Compatibilité Mobile</h3>
                <p>Des applications fluides et parfaitement adaptées aux appareils mobiles.</p>
            </div>
        </div>
        <!-- Feature 8 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-palette\"></i>
                <h3>Design Personnalisé</h3>
                <p>Un design sur mesure pour s'adapter parfaitement à votre identité visuelle.</p>
            </div>
        </div>
        <!-- Feature 9 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-robot\"></i>
                <h3>Intelligence Artificielle</h3>
                <p>Des solutions intelligentes pour automatiser et optimiser vos processus.</p>
            </div>
        </div>
        <!-- Feature 10 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-search\"></i>
                <h3>Recherche Avancée</h3>
                <p>Des outils de recherche avancée pour trouver rapidement l'information.</p>
            </div>
        </div>
        <!-- Feature 11 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-sync-alt\"></i>
                <h3>Synchronisation</h3>
                <p>Synchronisation en temps réel pour garantir la cohérence des données.</p>
            </div>
        </div>
        <!-- Feature 12 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-lock\"></i>
                <h3>Contrôle d'Accès</h3>
                <p>Contrôlez et gérez les accès à vos informations sensibles avec une grande flexibilité.</p>
            </div>
        </div>

    </div>
</section>


";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/home.twig";
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
        return array (  94 => 15,  87 => 10,  80 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Bienvenue sur My Innovative Website{% endblock %}

{% block style %}
<link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/home.css') }}\">
{% endblock %}

{% block content %}
<!-- Hero Section -->
<section class=\"features\">
    <div data-aos=\"zoom-in\">
        <h1>Bienvenue dans l'innovation</h1>
        <p>Solutions créatives pour relever vos défis numériques</p>
        <a href=\"{{base_url}}/features\" class=\"btn btn-primary hvr-float-shadow\">Explorer nos services</a>
    </div>
</section>

<!-- Features Section -->
<section id=\"features\" class=\"features mt-4\">
    <div class=\"row\">
        <!-- Feature 1 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-lightbulb\"></i>
                <h3>Idées Innovantes</h3>
                <p>Nous transformons vos idées en réalités grâce à des solutions technologiques.</p>
            </div>
        </div>
        <!-- Feature 2 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-cogs\"></i>
                <h3>Technologies Avancées</h3>
                <p>Des outils de pointe pour optimiser vos performances.</p>
            </div>
        </div>
        <!-- Feature 3 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-users\"></i>
                <h3>Service Client</h3>
                <p>Un support dédié pour accompagner vos projets.</p>
            </div>
        </div>
        <!-- Feature 4 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-shield-alt\"></i>
                <h3>Sécurité Renforcée</h3>
                <p>La sécurité est au cœur de notre développement pour protéger vos données.</p>
            </div>
        </div>
        <!-- Feature 5 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-chart-line\"></i>
                <h3>Performance Optimisée</h3>
                <p>Nous assurons un fonctionnement rapide et fluide de vos applications.</p>
            </div>
        </div>
        <!-- Feature 6 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-cloud\"></i>
                <h3>Solutions Cloud</h3>
                <p>Accédez à vos données en toute sécurité, où que vous soyez.</p>
            </div>
        </div>
        <!-- Feature 7 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-mobile-alt\"></i>
                <h3>Compatibilité Mobile</h3>
                <p>Des applications fluides et parfaitement adaptées aux appareils mobiles.</p>
            </div>
        </div>
        <!-- Feature 8 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-palette\"></i>
                <h3>Design Personnalisé</h3>
                <p>Un design sur mesure pour s'adapter parfaitement à votre identité visuelle.</p>
            </div>
        </div>
        <!-- Feature 9 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-robot\"></i>
                <h3>Intelligence Artificielle</h3>
                <p>Des solutions intelligentes pour automatiser et optimiser vos processus.</p>
            </div>
        </div>
        <!-- Feature 10 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-search\"></i>
                <h3>Recherche Avancée</h3>
                <p>Des outils de recherche avancée pour trouver rapidement l'information.</p>
            </div>
        </div>
        <!-- Feature 11 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-sync-alt\"></i>
                <h3>Synchronisation</h3>
                <p>Synchronisation en temps réel pour garantir la cohérence des données.</p>
            </div>
        </div>
        <!-- Feature 12 -->
        <div class=\"col-md-3 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"feature-box\">
                <i class=\"fas fa-lock\"></i>
                <h3>Contrôle d'Accès</h3>
                <p>Contrôlez et gérez les accès à vos informations sensibles avec une grande flexibilité.</p>
            </div>
        </div>

    </div>
</section>


{% endblock %}
", "home/home.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\home\\home.twig");
    }
}
