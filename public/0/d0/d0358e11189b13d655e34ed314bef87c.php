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

/* admin/settings.twig */
class __TwigTemplate_c5eebc244a677c1a7c4f212b518a46c8 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin/settings.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Paramètres";
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("css/settings.css"), "html", null, true);
        yield "\">
<style>
.switch input:checked + .slider 
{
    background-color: ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";
}
/* Personnalisation du curseur */
.custom-range {
    -webkit-appearance: none;
    appearance: none;
    width: 100%;
    height: 8px;
    background: #ddd;
    border-radius: 5px;
    outline: none;
    transition: background-color 0.3s ease;
}

/* Rendre le curseur plus visible et attrayant */
.custom-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Ajustement pour Firefox */
.custom-range::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: ";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Effet de transformation sur le thumb au survol */
.custom-range:hover::-webkit-slider-thumb,
.custom-range:hover::-moz-range-thumb {
    background: darken(";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ", 10%);
    transform: scale(1.2); /* Effet de zoom pour un retour visuel dynamique */
}

/* Barre de curseur colorée lorsque l'utilisateur interagit */
.custom-range:active {
    background: linear-gradient(to right, ";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield " 0%, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_2.value"), "html", null, true);
        yield " 100%);
}

</style>
";
        yield from [];
    }

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 62
        yield "<div class=\"container-fluid mt-4\">
    <div class=\"row\">
        <!-- Menu latéral -->
        ";
        // line 65
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "admin/settings.twig", 65)->unwrap()->yield($context);
        // line 66
        yield "
        <!-- Main content -->
        <main class=\"col-md-9 col-lg-9 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-cogs me-2\"></i> Paramètres de l'application</h1>
            </div>

            <form method=\"POST\">
                ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["settings_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 76
            yield "                    <div class=\"category-card\">
                        <h2 class=\"text-start\" style=\"color:";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
            yield ";\"><i class=\"fa ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ICON", [], "any", false, false, false, 77), "html", null, true);
            yield "\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "DESCRIPTION", [], "any", false, false, false, 77), "html", null, true);
            yield "</h2>
                        <table class=\"table table-bordered table-striped\">
                            <thead>
                                <tr>
                                    <th class='col-2'>Clé</th>
                                    <th class='col-6'>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 87
            $context["category_settings"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["grouped_settings"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 87), [], "array", true, true, false, 87) &&  !(null === (($_v0 = ($context["grouped_settings"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 87)] ?? null) : null)))) ? ((($_v1 = ($context["grouped_settings"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 87)] ?? null) : null)) : ([]));
            // line 88
            yield "
                                ";
            // line 89
            if (Twig\Extension\CoreExtension::testEmpty(($context["category_settings"] ?? null))) {
                // line 90
                yield "                                    <tr>
                                        <td colspan=\"3\">Aucun paramètre pour cette catégorie.</td>
                                    </tr>
                                ";
            } else {
                // line 94
                yield "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["category_settings"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["setting"]) {
                    // line 95
                    yield "                                        <tr>
                                            <td>";
                    // line 96
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 96), "html", null, true);
                    yield "</td>
                                            <td>";
                    // line 97
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "DESCRIPTION", [], "any", false, false, false, 97)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "DESCRIPTION", [], "any", false, false, false, 97), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 97), "html", null, true)));
                    yield "</td>
                                            <td>
                                                ";
                    // line 99
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "TYPE", [], "any", false, false, false, 99) == "text")) {
                        // line 100
                        yield "                                                    <input type=\"text\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 100), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 100), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 100), "html", null, true);
                        yield "]\" class=\"form-control\" ";
                        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 100))) {
                            yield " placeholder=\"Pas de valeurs\" ";
                        }
                        yield " value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 100), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 101
$context["setting"], "TYPE", [], "any", false, false, false, 101) == "mail")) {
                        // line 102
                        yield "                                                    <input type=\"email\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 102), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 102), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 102), "html", null, true);
                        yield "]\" class=\"form-control\" ";
                        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 102))) {
                            yield " placeholder=\"Pas de valeurs\" ";
                        }
                        yield " value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 102), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 103
$context["setting"], "TYPE", [], "any", false, false, false, 103) == "phone")) {
                        // line 104
                        yield "                                                    <input type=\"tel\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 104), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 104), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 104), "html", null, true);
                        yield "]\" class=\"form-control\" ";
                        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 104))) {
                            yield " placeholder=\"Pas de valeurs\" ";
                        }
                        yield " value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 104), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 105
$context["setting"], "TYPE", [], "any", false, false, false, 105) == "checkbox")) {
                        // line 106
                        yield "                                                    <label class=\"switch\">
                                                        <input type=\"hidden\" name=\"data[";
                        // line 107
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 107), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 107), "html", null, true);
                        yield "]\" value=\"0\">
                                                        <input type=\"checkbox\" id=\"";
                        // line 108
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 108), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 108), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 108), "html", null, true);
                        yield "]\" value=\"1\" class=\"slider\" ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 108) == "1")) {
                            yield "checked";
                        }
                        yield ">
                                                        <span class=\"slider\"></span>
                                                    </label>
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 111
$context["setting"], "TYPE", [], "any", false, false, false, 111) == "color")) {
                        // line 112
                        yield "                                                    <div class=\"mb-3\">
                                                        <input class=\"form-control form-control-color\" type=\"color\" id=\"";
                        // line 113
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 113), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 113), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 113), "html", null, true);
                        yield "]\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 113), "html", null, true);
                        yield "\">
                                                    </div>
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 115
$context["setting"], "TYPE", [], "any", false, false, false, 115) == "number")) {
                        // line 116
                        yield "                                                    <input type=\"number\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 116), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 116), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 116), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 116), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 117
$context["setting"], "TYPE", [], "any", false, false, false, 117) == "date")) {
                        // line 118
                        yield "                                                    <input type=\"date\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 118), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 118), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 118), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 118), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 119
$context["setting"], "TYPE", [], "any", false, false, false, 119) == "datetime-local")) {
                        // line 120
                        yield "                                                    <input type=\"datetime-local\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 120), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 120), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 120), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 120), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 121
$context["setting"], "TYPE", [], "any", false, false, false, 121) == "range")) {
                        // line 122
                        yield "                                                    <div class=\"mb-3 row position-relative\">
                                                        <div class=\"col-10\">
                                                            <input type=\"range\" 
                                                                   id=\"";
                        // line 125
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 125), "html", null, true);
                        yield "\" 
                                                                   name=\"data[";
                        // line 126
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 126), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 126), "html", null, true);
                        yield "]\" 
                                                                   class=\"form-range custom-range\" 
                                                                   value=\"";
                        // line 128
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 128), "html", null, true);
                        yield "\" 
                                                                   min=\"0\" 
                                                                   max=\"360\" 
                                                                   oninput=\"updateRangeValue(this)\">
                                                        </div>
                                                        <div class=\"col-2 d-flex justify-content-center align-items-center\">
                                                            <span id=\"range-value-";
                        // line 134
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 134), "html", null, true);
                        yield "\" 
                                                                  class=\"range-value fs-5\" 
                                                                  style=\"font-weight: bold; color: ";
                        // line 136
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
                        yield "; white-space: nowrap;\">
                                                                ";
                        // line 137
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 137), "html", null, true);
                        yield "
                                                            </span>
                                                        </div>
                                                    </div>
                                                ";
                    } else {
                        // line 142
                        yield "                                                    <input type=\"text\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 142), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 142), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 142), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 142), "html", null, true);
                        yield "\">
                                                ";
                    }
                    // line 144
                    yield "                                            </td>
                                        </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['setting'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 147
                yield "                                ";
            }
            // line 148
            yield "                            </tbody>
                        </table>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        yield "
                <!-- Bouton \"Mettre à jour\" -->
                <div class=\"fixed-button\">
                    <button type=\"submit\" class=\"btn-primary btn-sm ml-2\" value=\"1\" style=\"background-color:";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";\">Mettre à jour</button>
                </div>
            </form>
        </main>
    </div>
</div>


";
        yield from [];
    }

    // line 166
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_jquery(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 167
        yield "<script>
    function updateRangeValue(input) {
        // Met à jour la valeur dynamique du span en fonction du range
        const rangeValueElement = document.getElementById('range-value-' + input.id);
        rangeValueElement.textContent = input.value;
    }
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/settings.twig";
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
        return array (  462 => 167,  455 => 166,  441 => 155,  436 => 152,  427 => 148,  424 => 147,  416 => 144,  404 => 142,  396 => 137,  392 => 136,  387 => 134,  378 => 128,  371 => 126,  367 => 125,  362 => 122,  360 => 121,  349 => 120,  347 => 119,  336 => 118,  334 => 117,  323 => 116,  321 => 115,  310 => 113,  307 => 112,  305 => 111,  291 => 108,  285 => 107,  282 => 106,  280 => 105,  265 => 104,  263 => 103,  248 => 102,  246 => 101,  231 => 100,  229 => 99,  224 => 97,  220 => 96,  217 => 95,  212 => 94,  206 => 90,  204 => 89,  201 => 88,  199 => 87,  182 => 77,  179 => 76,  175 => 75,  164 => 66,  162 => 65,  157 => 62,  150 => 61,  138 => 55,  129 => 49,  117 => 40,  104 => 30,  81 => 10,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Paramètres{% endblock %}

{% block style %}
<link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/settings.css') }}\">
<style>
.switch input:checked + .slider 
{
    background-color: {{ config('SITE.site_color_1.value') }};
}
/* Personnalisation du curseur */
.custom-range {
    -webkit-appearance: none;
    appearance: none;
    width: 100%;
    height: 8px;
    background: #ddd;
    border-radius: 5px;
    outline: none;
    transition: background-color 0.3s ease;
}

/* Rendre le curseur plus visible et attrayant */
.custom-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: {{ config('SITE.site_color_1.value') }};
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Ajustement pour Firefox */
.custom-range::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: {{ config('SITE.site_color_1.value') }};
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Effet de transformation sur le thumb au survol */
.custom-range:hover::-webkit-slider-thumb,
.custom-range:hover::-moz-range-thumb {
    background: darken({{ config('SITE.site_color_1.value') }}, 10%);
    transform: scale(1.2); /* Effet de zoom pour un retour visuel dynamique */
}

/* Barre de curseur colorée lorsque l'utilisateur interagit */
.custom-range:active {
    background: linear-gradient(to right, {{ config('SITE.site_color_1.value') }} 0%, {{ config('SITE.site_color_2.value') }} 100%);
}

</style>
{% endblock %}

{% block content %}
<div class=\"container-fluid mt-4\">
    <div class=\"row\">
        <!-- Menu latéral -->
        {% include 'admin/include/adminMenu.twig' %}

        <!-- Main content -->
        <main class=\"col-md-9 col-lg-9 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-cogs me-2\"></i> Paramètres de l'application</h1>
            </div>

            <form method=\"POST\">
                {% for category in settings_categories %}
                    <div class=\"category-card\">
                        <h2 class=\"text-start\" style=\"color:{{ config('SITE.site_color_1.value') }};\"><i class=\"fa {{category.ICON}}\"></i> {{ category.DESCRIPTION }}</h2>
                        <table class=\"table table-bordered table-striped\">
                            <thead>
                                <tr>
                                    <th class='col-2'>Clé</th>
                                    <th class='col-6'>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% set category_settings = grouped_settings[category.ID] ?? [] %}

                                {% if category_settings is empty %}
                                    <tr>
                                        <td colspan=\"3\">Aucun paramètre pour cette catégorie.</td>
                                    </tr>
                                {% else %}
                                    {% for setting in category_settings %}
                                        <tr>
                                            <td>{{ setting.NAME }}</td>
                                            <td>{{ setting.DESCRIPTION ?: setting.NAME }}</td>
                                            <td>
                                                {% if setting.TYPE == 'text' %}
                                                    <input type=\"text\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" {% if setting.VALUE is empty %} placeholder=\"Pas de valeurs\" {% endif %} value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'mail' %}
                                                    <input type=\"email\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" {% if setting.VALUE is empty %} placeholder=\"Pas de valeurs\" {% endif %} value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'phone' %}
                                                    <input type=\"tel\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" {% if setting.VALUE is empty %} placeholder=\"Pas de valeurs\" {% endif %} value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'checkbox' %}
                                                    <label class=\"switch\">
                                                        <input type=\"hidden\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" value=\"0\">
                                                        <input type=\"checkbox\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" value=\"1\" class=\"slider\" {% if setting.VALUE == '1' %}checked{% endif %}>
                                                        <span class=\"slider\"></span>
                                                    </label>
                                                {% elseif setting.TYPE == 'color' %}
                                                    <div class=\"mb-3\">
                                                        <input class=\"form-control form-control-color\" type=\"color\" id=\"{{ setting.NAME }}\" name=\"data[{{ category.NAME }}][{{ setting.NAME }}]\" value=\"{{ setting.VALUE }}\">
                                                    </div>
                                                {% elseif setting.TYPE == 'number' %}
                                                    <input type=\"number\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'date' %}
                                                    <input type=\"date\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'datetime-local' %}
                                                    <input type=\"datetime-local\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'range' %}
                                                    <div class=\"mb-3 row position-relative\">
                                                        <div class=\"col-10\">
                                                            <input type=\"range\" 
                                                                   id=\"{{ setting.NAME }}\" 
                                                                   name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" 
                                                                   class=\"form-range custom-range\" 
                                                                   value=\"{{ setting.VALUE }}\" 
                                                                   min=\"0\" 
                                                                   max=\"360\" 
                                                                   oninput=\"updateRangeValue(this)\">
                                                        </div>
                                                        <div class=\"col-2 d-flex justify-content-center align-items-center\">
                                                            <span id=\"range-value-{{ setting.NAME }}\" 
                                                                  class=\"range-value fs-5\" 
                                                                  style=\"font-weight: bold; color: {{ config('SITE.site_color_1.value') }}; white-space: nowrap;\">
                                                                {{ setting.VALUE }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                {% else %}
                                                    <input type=\"text\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" value=\"{{ setting.VALUE }}\">
                                                {% endif %}
                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% endif %}
                            </tbody>
                        </table>
                    </div>
                {% endfor %}

                <!-- Bouton \"Mettre à jour\" -->
                <div class=\"fixed-button\">
                    <button type=\"submit\" class=\"btn-primary btn-sm ml-2\" value=\"1\" style=\"background-color:{{ config('SITE.site_color_1.value') }};\">Mettre à jour</button>
                </div>
            </form>
        </main>
    </div>
</div>


{% endblock %}


{% block jquery %}
<script>
    function updateRangeValue(input) {
        // Met à jour la valeur dynamique du span en fonction du range
        const rangeValueElement = document.getElementById('range-value-' + input.id);
        rangeValueElement.textContent = input.value;
    }
</script>
{% endblock %}
", "admin/settings.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\settings.twig");
    }
}
