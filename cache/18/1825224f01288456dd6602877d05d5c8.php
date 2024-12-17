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

/* base.twig */
class __TwigTemplate_9a7d5c3636392700510604a23beb8864 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "base.twig", 1);
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
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<!-- Hero Section avec animation d'entrée -->
<section class=\"hero bg-gradient text-white py-5\" style=\"background: linear-gradient(45deg, #ff6b81, #6c5ce7);\">
    <div class=\"container text-center\">
        <h1 class=\"display-3 mb-4 animate__animated animate__fadeIn\">Bienvenue sur notre site innovant !</h1>
        <p class=\"lead mb-4 animate__animated animate__fadeIn\">Découvrez des solutions créatives pour vos défis numériques.</p>
        <a href=\"#services\" class=\"btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-1s hvr-float-shadow\">Découvrez nos services</a>
    </div>
</section>

<!-- Section Nos Services avec animations -->
<section id=\"services\" class=\"py-5 bg-light\">
    <div class=\"container\">
        <h2 class=\"text-center mb-4\">Nos Services</h2>
        <div class=\"row\">
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-cogs fa-4x mb-3 animate__animated animate__zoomIn\"></i>
                <h4>Développement Web</h4>
                <p>Créez des applications web personnalisées avec des fonctionnalités avancées pour répondre à vos besoins.</p>
            </div>
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-paint-brush fa-4x mb-3 animate__animated animate__zoomIn animate__delay-1s\"></i>
                <h4>Design UX/UI</h4>
                <p>Concevez des interfaces modernes et intuitives, optimisées pour l'engagement des utilisateurs.</p>
            </div>
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-cloud fa-4x mb-3 animate__animated animate__zoomIn animate__delay-2s\"></i>
                <h4>Solutions Cloud</h4>
                <p>Offrez des solutions sécurisées et évolutives pour héberger vos données et applications.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Témoignages avec effet de parallaxe -->
<section class=\"testimonials py-5 bg-dark text-white\" style=\"background: url('https://via.placeholder.com/1500') no-repeat center center fixed; background-size: cover;\">
    <div class=\"container text-center\">
        <h2 class=\"mb-4\">Témoignages</h2>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-1s\">
                    <p>\"Une équipe dynamique et toujours à l'écoute. Ils ont fait un excellent travail pour notre projet.\"</p>
                    <footer class=\"blockquote-footer text-white\">Client A</footer>
                </blockquote>
            </div>
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-2s\">
                    <p>\"Des solutions créatives et un service client impeccable. Nous recommandons vivement leurs services !\"</p>
                    <footer class=\"blockquote-footer text-white\">Client B</footer>
                </blockquote>
            </div>
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-3s\">
                    <p>\"Ils ont transformé notre vision en réalité. Une équipe de professionnels à la pointe de la technologie.\"</p>
                    <footer class=\"blockquote-footer text-white\">Client C</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section avec animation -->
<section class=\"cta py-5 bg-primary text-white\">
    <div class=\"container text-center\">
        <h2 class=\"display-4 mb-4 animate__animated animate__fadeIn\">Prêt à démarrer votre projet ?</h2>
        <p class=\"lead mb-4 animate__animated animate__fadeIn animate__delay-1s\">Contactez-nous aujourd'hui et laissez-nous vous aider à créer quelque chose de spectaculaire !</p>
        <a href=\"/contact\" class=\"btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-2s hvr-pulse-grow\">Contactez-nous</a>
    </div>
</section>

<!-- Footer Section avec animation -->
<footer class=\"py-5 bg-dark text-white\">
    <div class=\"container text-center\">
        <p>&copy; 2012 - ";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield " My Innovative Website. Tous droits réservés.</p>
        <div class=\"social-buttons\">
            <a href=\"https://facebook.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-facebook\"></i></a>
            <a href=\"https://instagram.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-instagram\"></i></a>
            <a href=\"https://linkedin.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-linkedin\"></i></a>
            <a href=\"https://twitter.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-twitter\"></i></a>
        </div>
    </div>
</footer>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.twig";
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
        return array (  144 => 78,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Bienvenue sur My Innovative Website{% endblock %}

{% block content %}
<!-- Hero Section avec animation d'entrée -->
<section class=\"hero bg-gradient text-white py-5\" style=\"background: linear-gradient(45deg, #ff6b81, #6c5ce7);\">
    <div class=\"container text-center\">
        <h1 class=\"display-3 mb-4 animate__animated animate__fadeIn\">Bienvenue sur notre site innovant !</h1>
        <p class=\"lead mb-4 animate__animated animate__fadeIn\">Découvrez des solutions créatives pour vos défis numériques.</p>
        <a href=\"#services\" class=\"btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-1s hvr-float-shadow\">Découvrez nos services</a>
    </div>
</section>

<!-- Section Nos Services avec animations -->
<section id=\"services\" class=\"py-5 bg-light\">
    <div class=\"container\">
        <h2 class=\"text-center mb-4\">Nos Services</h2>
        <div class=\"row\">
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-cogs fa-4x mb-3 animate__animated animate__zoomIn\"></i>
                <h4>Développement Web</h4>
                <p>Créez des applications web personnalisées avec des fonctionnalités avancées pour répondre à vos besoins.</p>
            </div>
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-paint-brush fa-4x mb-3 animate__animated animate__zoomIn animate__delay-1s\"></i>
                <h4>Design UX/UI</h4>
                <p>Concevez des interfaces modernes et intuitives, optimisées pour l'engagement des utilisateurs.</p>
            </div>
            <div class=\"col-md-4 text-center\">
                <i class=\"fa fa-cloud fa-4x mb-3 animate__animated animate__zoomIn animate__delay-2s\"></i>
                <h4>Solutions Cloud</h4>
                <p>Offrez des solutions sécurisées et évolutives pour héberger vos données et applications.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Témoignages avec effet de parallaxe -->
<section class=\"testimonials py-5 bg-dark text-white\" style=\"background: url('https://via.placeholder.com/1500') no-repeat center center fixed; background-size: cover;\">
    <div class=\"container text-center\">
        <h2 class=\"mb-4\">Témoignages</h2>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-1s\">
                    <p>\"Une équipe dynamique et toujours à l'écoute. Ils ont fait un excellent travail pour notre projet.\"</p>
                    <footer class=\"blockquote-footer text-white\">Client A</footer>
                </blockquote>
            </div>
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-2s\">
                    <p>\"Des solutions créatives et un service client impeccable. Nous recommandons vivement leurs services !\"</p>
                    <footer class=\"blockquote-footer text-white\">Client B</footer>
                </blockquote>
            </div>
            <div class=\"col-md-4\">
                <blockquote class=\"blockquote text-white animate__animated animate__fadeIn animate__delay-3s\">
                    <p>\"Ils ont transformé notre vision en réalité. Une équipe de professionnels à la pointe de la technologie.\"</p>
                    <footer class=\"blockquote-footer text-white\">Client C</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section avec animation -->
<section class=\"cta py-5 bg-primary text-white\">
    <div class=\"container text-center\">
        <h2 class=\"display-4 mb-4 animate__animated animate__fadeIn\">Prêt à démarrer votre projet ?</h2>
        <p class=\"lead mb-4 animate__animated animate__fadeIn animate__delay-1s\">Contactez-nous aujourd'hui et laissez-nous vous aider à créer quelque chose de spectaculaire !</p>
        <a href=\"/contact\" class=\"btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-2s hvr-pulse-grow\">Contactez-nous</a>
    </div>
</section>

<!-- Footer Section avec animation -->
<footer class=\"py-5 bg-dark text-white\">
    <div class=\"container text-center\">
        <p>&copy; 2012 - {{ date | date('Y') }} My Innovative Website. Tous droits réservés.</p>
        <div class=\"social-buttons\">
            <a href=\"https://facebook.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-facebook\"></i></a>
            <a href=\"https://instagram.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-instagram\"></i></a>
            <a href=\"https://linkedin.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-linkedin\"></i></a>
            <a href=\"https://twitter.com\" target=\"_blank\" class=\"btn btn-outline-light btn-sm hvr-bounce-in\"><i class=\"fab fa-twitter\"></i></a>
        </div>
    </div>
</footer>

{% endblock %}
", "base.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\base.twig");
    }
}
