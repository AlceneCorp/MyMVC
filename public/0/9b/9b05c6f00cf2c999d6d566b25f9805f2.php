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
    </style>

    ";
        // line 53
        yield from $this->unwrap()->yieldBlock('style', $context, $blocks);
        // line 55
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
        // line 66
        if ($this->env->getFunction('config')->getCallable()("SITE.site_logo.value")) {
            // line 67
            yield "                    <a class=\"navbar-brand text-center my-4 me-3\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/accueil\">
                        <div class=\"d-inline-block rounded-circle overflow-hidden shadow-sm logo-container\">
                            <img src=\"";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()($this->env->getFunction('config')->getCallable()("SITE.site_logo.value")), "html", null, true);
            yield "\" class=\"img-fluid logo-img\" alt=\"Logo\" />
                        </div>
                    </a>
                ";
        }
        // line 73
        yield "                <span class=\"navbar-subtext text-secondary me-5\">
                    <a class=\"navbar-brand brand\" href=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        yield "/accueil\">
                        <h1 class=\"h4 text-white mb-0 site-title\">";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_name.value"), "html", null, true);
        yield "</h1>
                    </a>
                    <br />
                    <span class=\"subbrand\">
                        <h2 class=\"h5 text-white mb-0\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.brand.value"), "html", null, true);
        yield "</h2>
                    </span>
                </span>
                <div class=\"collapse navbar-collapse\" id=\"navbarToggler\">
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        ";
        // line 84
        yield ($context["menu"] ?? null);
        yield "
                    </ul>

                     <!-- Connexion Button -->
                    <ul class=\"nav\">
                        ";
        // line 89
        if (($context["is_login"] ?? null)) {
            // line 90
            yield "                            <li class=\"nav-item\">
                                <a href=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/logout\" class=\"btn btn-outline-light\">
                                    <i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
                                </a>
                            </li>
                        ";
        } else {
            // line 96
            yield "                            <li class=\"nav-item\">
                                <a href=\"";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
            yield "/login\" class=\"btn btn-outline-light\">
                                    <i class=\"fas fa-sign-in-alt me-2\"></i> Connexion
                                </a>
                            </li>
                        ";
        }
        // line 102
        yield "                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Main Content -->
    <main class=\"pt-3 pb-3 hero\" id=\"main-content\">
        <section class=\"\" data-aos=\"fade-up\">
            <div class=\"row\">
                <div class=\"col-md-10 offset-1\">
                    ";
        // line 114
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 117
        yield "                </div>
            </div>
        </section>
    </main>

    

    <!-- Footer Section -->
    <footer class=\"py-2\">
        <div class=\"container text-center\">
            ";
        // line 127
        if (((($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value") && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value")) && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value")) && $this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value"))) {
            // line 128
            yield "            <div class=\"social-buttons mb-3\">
                ";
            // line 129
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value")) {
                // line 130
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_facebook.value"), "html", null, true);
                yield "\"><i class=\"fab fa-facebook\"></i></a>
                ";
            }
            // line 132
            yield "
                ";
            // line 133
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value")) {
                // line 134
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_instagram.value"), "html", null, true);
                yield "\"><i class=\"fab fa-instagram\"></i></a>
                ";
            }
            // line 136
            yield "                
                ";
            // line 137
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value")) {
                // line 138
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_linkedin.value"), "html", null, true);
                yield "\"><i class=\"fab fa-linkedin\"></i></a>
                ";
            }
            // line 140
            yield "
                ";
            // line 141
            if ($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value")) {
                // line 142
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SOCIALNETWORK.sn_x.value"), "html", null, true);
                yield "\"><i class=\"fab fa-x-twitter\"></i></a>
                ";
            }
            // line 144
            yield "            </div>
            ";
        }
        // line 146
        yield "            <p>&copy; 2022 - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "Y"), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_name.value"), "html", null, true);
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
        // line 159
        yield from $this->unwrap()->yieldBlock('jquery', $context, $blocks);
        // line 162
        yield "</body>
</html>
";
        yield from [];
    }

    // line 53
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 54
        yield "    ";
        yield from [];
    }

    // line 114
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 115
        yield "
                    ";
        yield from [];
    }

    // line 159
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 160
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
        return array (  350 => 160,  343 => 159,  337 => 115,  330 => 114,  325 => 54,  318 => 53,  311 => 162,  309 => 159,  290 => 146,  286 => 144,  280 => 142,  278 => 141,  275 => 140,  269 => 138,  267 => 137,  264 => 136,  258 => 134,  256 => 133,  253 => 132,  247 => 130,  245 => 129,  242 => 128,  240 => 127,  228 => 117,  226 => 114,  212 => 102,  204 => 97,  201 => 96,  193 => 91,  190 => 90,  188 => 89,  180 => 84,  172 => 79,  165 => 75,  161 => 74,  158 => 73,  150 => 69,  144 => 67,  142 => 66,  129 => 55,  127 => 53,  113 => 46,  95 => 35,  81 => 28,  72 => 23,  52 => 6,  45 => 1,);
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

                     <!-- Connexion Button -->
                    <ul class=\"nav\">
                        {% if is_login %}
                            <li class=\"nav-item\">
                                <a href=\"{{base_url}}/logout\" class=\"btn btn-outline-light\">
                                    <i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
                                </a>
                            </li>
                        {% else %}
                            <li class=\"nav-item\">
                                <a href=\"{{base_url}}/login\" class=\"btn btn-outline-light\">
                                    <i class=\"fas fa-sign-in-alt me-2\"></i> Connexion
                                </a>
                            </li>
                        {% endif %}
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Main Content -->
    <main class=\"pt-3 pb-3 hero\" id=\"main-content\">
        <section class=\"\" data-aos=\"fade-up\">
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
        <div class=\"container text-center\">
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
            <p>&copy; 2022 - {{ date | date('Y') }} {{ config('SITE.site_name.value') }}. Tous droits réservés.</p>
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
