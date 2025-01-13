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
        yield "<div class=\"container-fluid mt-4\">
    <div class=\"row\">
        <!-- Menu latéral -->
        ";
        // line 13
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "admin/settings.twig", 13)->unwrap()->yield($context);
        // line 14
        yield "
        <!-- Main content -->
        <main class=\"col-md-9 col-lg-9 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-cogs me-2\"></i> Paramètres de l'application</h1>
            </div>

            <form method=\"POST\">
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["settings_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 24
            yield "                    <div class=\"category-card\">
                        <h2 class=\"text-start\"><i class=\"fa ";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ICON", [], "any", false, false, false, 25), "html", null, true);
            yield "\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "DESCRIPTION", [], "any", false, false, false, 25), "html", null, true);
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
            // line 35
            $context["category_settings"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["grouped_settings"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 35), [], "array", true, true, false, 35) &&  !(null === (($_v0 = ($context["grouped_settings"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 35)] ?? null) : null)))) ? ((($_v1 = ($context["grouped_settings"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["category"], "ID", [], "any", false, false, false, 35)] ?? null) : null)) : ([]));
            // line 36
            yield "
                                ";
            // line 37
            if (Twig\Extension\CoreExtension::testEmpty(($context["category_settings"] ?? null))) {
                // line 38
                yield "                                    <tr>
                                        <td colspan=\"3\">Aucun paramètre pour cette catégorie.</td>
                                    </tr>
                                ";
            } else {
                // line 42
                yield "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["category_settings"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["setting"]) {
                    // line 43
                    yield "                                        <tr>
                                            <td>";
                    // line 44
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 44)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 44), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 44), "html", null, true)));
                    yield "</td>
                                            <td>";
                    // line 45
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "DESCRIPTION", [], "any", false, false, false, 45)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "DESCRIPTION", [], "any", false, false, false, 45), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 45), "html", null, true)));
                    yield "</td>
                                            <td>
                                                ";
                    // line 47
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "TYPE", [], "any", false, false, false, 47) == "text")) {
                        // line 48
                        yield "                                                    <input type=\"text\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 48), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 48), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 48), "html", null, true);
                        yield "]\" class=\"form-control\" ";
                        if ( !CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 48)) {
                            yield " placeholder=\"Pas de valeurs\" ";
                        }
                        yield " value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 48), "html", null, true);
                        yield "\">
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 49
$context["setting"], "TYPE", [], "any", false, false, false, 49) == "checkbox")) {
                        // line 50
                        yield "                                                    <label class=\"switch\">
                                                        <input type=\"hidden\" name=\"data[";
                        // line 51
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 51), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 51), "html", null, true);
                        yield "]\" value=\"0\">
                                                        <input type=\"checkbox\" id=\"";
                        // line 52
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 52), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 52), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 52), "html", null, true);
                        yield "]\" value=\"1\" class=\"slider\" ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 52) == "1")) {
                            yield "checked";
                        }
                        yield ">
                                                        <span class=\"slider\"></span>
                                                    </label>
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 55
$context["setting"], "TYPE", [], "any", false, false, false, 55) == "color")) {
                        // line 56
                        yield "                                                    <div class=\"mb-3\">
                                                        <input class=\"form-control form-control-color\" type=\"color\" id=\"colorPicker\" name=\"data[";
                        // line 57
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 57), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 57), "html", null, true);
                        yield "]\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 57), "html", null, true);
                        yield "\">
                                                    </div>
                                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 59
$context["setting"], "TYPE", [], "any", false, false, false, 59) == "number")) {
                        // line 60
                        yield "                                                    <input type=\"number\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 60), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 60), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 60), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 60), "html", null, true);
                        yield "\">
                                                ";
                    } else {
                        // line 62
                        yield "                                                    <input type=\"text\" id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 62), "html", null, true);
                        yield "\" name=\"data[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "NAME", [], "any", false, false, false, 62), "html", null, true);
                        yield "][";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "NAME", [], "any", false, false, false, 62), "html", null, true);
                        yield "]\" class=\"form-control\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["setting"], "VALUE", [], "any", false, false, false, 62), "html", null, true);
                        yield "\">
                                                ";
                    }
                    // line 64
                    yield "                                            </td>
                                        </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['setting'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                yield "                                ";
            }
            // line 68
            yield "                            </tbody>
                        </table>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        yield "
                <!-- Bouton \"Mettre à jour\" -->
                <div class=\"fixed-button\">
                    <button type=\"submit\" class=\"btn-primary btn-sm ml-5\" value=\"1\">Mettre à jour</button>
                </div>
            </form>
        </main>
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
        return array (  259 => 72,  250 => 68,  247 => 67,  239 => 64,  227 => 62,  215 => 60,  213 => 59,  204 => 57,  201 => 56,  199 => 55,  185 => 52,  179 => 51,  176 => 50,  174 => 49,  159 => 48,  157 => 47,  152 => 45,  148 => 44,  145 => 43,  140 => 42,  134 => 38,  132 => 37,  129 => 36,  127 => 35,  112 => 25,  109 => 24,  105 => 23,  94 => 14,  92 => 13,  87 => 10,  80 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Paramètres{% endblock %}

{% block style %}
<link rel=\"stylesheet\" href=\"{{base_url}}{{ asset('css/settings.css') }}\">
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
                        <h2 class=\"text-start\"><i class=\"fa {{category.ICON}}\"></i> {{ category.DESCRIPTION }}</h2>
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
                                            <td>{{ setting.NAME ?: setting.NAME }}</td>
                                            <td>{{ setting.DESCRIPTION ?: setting.NAME }}</td>
                                            <td>
                                                {% if setting.TYPE == 'text' %}
                                                    <input type=\"text\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" {% if not setting.VALUE %} placeholder=\"Pas de valeurs\" {% endif %} value=\"{{ setting.VALUE }}\">
                                                {% elseif setting.TYPE == 'checkbox' %}
                                                    <label class=\"switch\">
                                                        <input type=\"hidden\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" value=\"0\">
                                                        <input type=\"checkbox\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" value=\"1\" class=\"slider\" {% if setting.VALUE == '1' %}checked{% endif %}>
                                                        <span class=\"slider\"></span>
                                                    </label>
                                                {% elseif setting.TYPE == 'color' %}
                                                    <div class=\"mb-3\">
                                                        <input class=\"form-control form-control-color\" type=\"color\" id=\"colorPicker\" name=\"data[{{ category.NAME }}][{{ setting.NAME }}]\" value=\"{{ setting.VALUE }}\">
                                                    </div>
                                                {% elseif setting.TYPE == 'number' %}
                                                    <input type=\"number\" id=\"{{ setting.NAME }}\" name=\"data[{{category.NAME}}][{{ setting.NAME }}]\" class=\"form-control\" value=\"{{ setting.VALUE }}\">
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
                    <button type=\"submit\" class=\"btn-primary btn-sm ml-5\" value=\"1\">Mettre à jour</button>
                </div>
            </form>
        </main>
    </div>
</div>
{% endblock %}
", "admin/settings.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\admin\\settings.twig");
    }
}
