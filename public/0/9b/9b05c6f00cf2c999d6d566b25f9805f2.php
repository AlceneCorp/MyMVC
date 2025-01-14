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
class __TwigTemplate_2ae5baf3da4dbc34838f3491087c178b extends Template
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
            'style' => [$this, 'block_style'],
            'content' => [$this, 'block_content'],
            'jquery' => [$this, 'block_jquery'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_name.value"), "html", null, true);
        yield "</title>
    
    <!-- Bootstrap CSS -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css\" rel=\"stylesheet\">
    
    <!-- Font Awesome -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\" rel=\"stylesheet\">

    <!-- AOS (Animate on Scroll) -->
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css\">
    
    <!-- Hover.css -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css\">

    <!-- Google Fonts -->
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Raleway:wght@400;700&display=swap\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("css/base.css"), "html", null, true);
        yield "\">
    
    <style>
        header 
        {
            background: linear-gradient(";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_angle.value"), "html", null, true);
        yield "deg, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_2.value"), "html", null, true);
        yield ");
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        footer 
        {
            background: linear-gradient(";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_angle.value"), "html", null, true);
        yield "deg, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_2.value"), "html", null, true);
        yield ");
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* --- HERO SECTION --- */
        .hero 
        {
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: linear-gradient(";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_angle.value"), "html", null, true);
        yield "deg, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_2.value"), "html", null, true);
        yield ");
            color: white;
            text-align: center;
            background-attachment: fixed; /* Pour garder l'arrière-plan fixe pendant le défilement */
        }
        /* Survol des éléments du menu */
        .nav-item a:hover 
        {
            background-color:";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield "; /* Fond sombre au survol */
            transform: translateX(5px); /* Déplacer légèrement le lien vers la droite au survol */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ombre portée subtile */
            color: #ecf0f1; /* Changer la couleur du texte au survol */
        }
    </style>

    ";
        // line 61
        yield from $this->unwrap()->yieldBlock('style', $context, $blocks);
        // line 63
        yield "</head>
<body>

    <!-- Header Section -->
    <header class=\"py-3 bg-dark\">
        <nav class=\"navbar navbar-expand-lg\">
            <div class=\"container\">
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarToggler\" aria-controls=\"navbarToggler\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <!-- Logo or Title -->
                ";
        // line 74
        if ($this->env->getFunction('config')->getCallable()("SITE.site_logo.value")) {
            // line 75
            yield "                    <a class=\"navbar-brand text-center my-4 me-3\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/accueil\">
                        <div class=\"d-inline-block rounded-circle overflow-hidden shadow-sm logo-container\">
                            <img src=\"";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()($this->env->getFunction('config')->getCallable()("SITE.site_logo.value")), "html", null, true);
            yield "\" class=\"img-fluid logo-img\" alt=\"Logo\" />
                        </div>
                    </a>
                ";
        }
        // line 81
        yield "                <span class=\"navbar-subtext text-secondary me-5\">
                    <a class=\"navbar-brand brand\" href=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/accueil\">
                        <h1 class=\"h4 text-white mb-0 site-title\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_name.value"), "html", null, true);
        yield "</h1>
                    </a>
                    <br />
                    <span class=\"subbrand\">
                        <h2 class=\"h5 text-white mb-0\">";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.brand.value"), "html", null, true);
        yield "</h2>
                    </span>
                </span>
                <div class=\"collapse navbar-collapse\" id=\"navbarToggler\">
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        ";
        // line 92
        yield ($context["menu"] ?? null);
        yield "
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class=\"pt-3 pb-3 hero\" id=\"main-content\">
        <section class=\"container-fluid\" data-aos=\"fade-up\">
            <div class=\"row\">
                <div class=\"col-md-10 offset-1\">
                    ";
        // line 104
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 107
        yield "                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class=\"py-2\">
        <div class=\"container-fluid text-center\">
            ";
        // line 115
        if (((($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value") && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value")) && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value")) && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value"))) {
            // line 116
            yield "            <div class=\"social-buttons mb-3\">
                ";
            // line 117
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value")) {
                // line 118
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value"), "html", null, true);
                yield "\"><i class=\"fab fa-facebook\"></i></a>
                ";
            }
            // line 120
            yield "
                ";
            // line 121
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value")) {
                // line 122
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value"), "html", null, true);
                yield "\"><i class=\"fab fa-instagram\"></i></a>
                ";
            }
            // line 124
            yield "                
                ";
            // line 125
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value")) {
                // line 126
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value"), "html", null, true);
                yield "\"><i class=\"fab fa-linkedin\"></i></a>
                ";
            }
            // line 128
            yield "
                ";
            // line 129
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value")) {
                // line 130
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value"), "html", null, true);
                yield "\"><i class=\"fab fa-x-twitter\"></i></a>
                ";
            }
            // line 132
            yield "            </div>
            ";
        }
        // line 134
        yield "            <p>&copy; 2022 - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.brand.value"), "html", null, true);
        yield ". Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js\"></script>
    <script>
        AOS.init({
        });
    </script>
    
    ";
        // line 147
        yield from $this->unwrap()->yieldBlock('jquery', $context, $blocks);
        // line 150
        yield "</body>
</html>
";
        yield from [];
    }

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 62
        yield "    ";
        yield from [];
    }

    // line 104
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 105
        yield "
                    ";
        yield from [];
    }

    // line 147
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 148
        yield "
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
        return array (  328 => 148,  321 => 147,  315 => 105,  308 => 104,  303 => 62,  296 => 61,  289 => 150,  287 => 147,  268 => 134,  264 => 132,  258 => 130,  256 => 129,  253 => 128,  247 => 126,  245 => 125,  242 => 124,  236 => 122,  234 => 121,  231 => 120,  225 => 118,  223 => 117,  220 => 116,  218 => 115,  208 => 107,  206 => 104,  191 => 92,  183 => 87,  176 => 83,  172 => 82,  169 => 81,  161 => 77,  155 => 75,  153 => 74,  140 => 63,  138 => 61,  128 => 54,  113 => 46,  95 => 35,  81 => 28,  72 => 23,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ config('SITE.site_name.value') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css\" rel=\"stylesheet\">
    
    <!-- Font Awesome -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\" rel=\"stylesheet\">

    <!-- AOS (Animate on Scroll) -->
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css\">
    
    <!-- Hover.css -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css\">

    <!-- Google Fonts -->
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Raleway:wght@400;700&display=swap\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/base.css') }}\">
    
    <style>
        header 
        {
            background: linear-gradient({{ config('SITE.site_color_angle.value') }}deg, {{ config('SITE.site_color_1.value') }}, {{ config('SITE.site_color_2.value') }});
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        footer 
        {
            background: linear-gradient({{ config('SITE.site_color_angle.value') }}deg, {{ config('SITE.site_color_1.value') }}, {{ config('SITE.site_color_2.value') }});
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* --- HERO SECTION --- */
        .hero 
        {
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: linear-gradient({{ config('SITE.site_color_angle.value') }}deg, {{ config('SITE.site_color_1.value') }}, {{ config('SITE.site_color_2.value') }});
            color: white;
            text-align: center;
            background-attachment: fixed; /* Pour garder l'arrière-plan fixe pendant le défilement */
        }
        /* Survol des éléments du menu */
        .nav-item a:hover 
        {
            background-color:{{ config('SITE.site_color_1.value') }}; /* Fond sombre au survol */
            transform: translateX(5px); /* Déplacer légèrement le lien vers la droite au survol */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ombre portée subtile */
            color: #ecf0f1; /* Changer la couleur du texte au survol */
        }
    </style>

    {% block style %}
    {% endblock %}
</head>
<body>

    <!-- Header Section -->
    <header class=\"py-3 bg-dark\">
        <nav class=\"navbar navbar-expand-lg\">
            <div class=\"container\">
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarToggler\" aria-controls=\"navbarToggler\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <!-- Logo or Title -->
                {% if config('SITE.site_logo.value') %}
                    <a class=\"navbar-brand text-center my-4 me-3\" href=\"{{ base_url }}/accueil\">
                        <div class=\"d-inline-block rounded-circle overflow-hidden shadow-sm logo-container\">
                            <img src=\"{{ base_url }}{{ asset(config('SITE.site_logo.value')) }}\" class=\"img-fluid logo-img\" alt=\"Logo\" />
                        </div>
                    </a>
                {% endif %}
                <span class=\"navbar-subtext text-secondary me-5\">
                    <a class=\"navbar-brand brand\" href=\"{{ base_url }}/accueil\">
                        <h1 class=\"h4 text-white mb-0 site-title\">{{ config('SITE.site_name.value') }}</h1>
                    </a>
                    <br />
                    <span class=\"subbrand\">
                        <h2 class=\"h5 text-white mb-0\">{{ config('SITE.brand.value') }}</h2>
                    </span>
                </span>
                <div class=\"collapse navbar-collapse\" id=\"navbarToggler\">
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        {{menu | raw}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class=\"pt-3 pb-3 hero\" id=\"main-content\">
        <section class=\"container-fluid\" data-aos=\"fade-up\">
            <div class=\"row\">
                <div class=\"col-md-10 offset-1\">
                    {% block content %}

                    {% endblock %}
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class=\"py-2\">
        <div class=\"container-fluid text-center\">
            {% if config('SOCIALNETWORK.sn_facebook.value') and config('SOCIALNETWORK.sn_instagram.value') and config('SOCIALNETWORK.sn_linkedin.value') and config('SOCIALNETWORK.sn_x.value') %}
            <div class=\"social-buttons mb-3\">
                {% if config('SOCIALNETWORK.sn_facebook.value') %}
                    <a href=\"{{ config('SOCIALNETWORK.sn_facebook.value') }}\"><i class=\"fab fa-facebook\"></i></a>
                {% endif %}

                {% if config('SOCIALNETWORK.sn_instagram.value') %}
                    <a href=\"{{ config('SOCIALNETWORK.sn_instagram.value') }}\"><i class=\"fab fa-instagram\"></i></a>
                {% endif %}
                
                {% if config('SOCIALNETWORK.sn_linkedin.value') %}
                    <a href=\"{{ config('SOCIALNETWORK.sn_linkedin.value') }}\"><i class=\"fab fa-linkedin\"></i></a>
                {% endif %}

                {% if config('SOCIALNETWORK.sn_x.value') %}
                    <a href=\"{{ config('SOCIALNETWORK.sn_x.value') }}\"><i class=\"fab fa-x-twitter\"></i></a>
                {% endif %}
            </div>
            {% endif %}
            <p>&copy; 2022 - {{ date | date('Y') }} {{ config('SITE.brand.value') }}. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js\"></script>
    <script>
        AOS.init({
        });
    </script>
    
    {% block jquery %}

    {% endblock %}
</body>
</html>
", "base.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\base.twig");
    }
}
