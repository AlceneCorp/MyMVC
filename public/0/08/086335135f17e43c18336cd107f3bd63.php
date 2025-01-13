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

/* user/myprofil.twig */
class __TwigTemplate_ab7842e23e9b26d290867daf0b54ad29 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "user/myprofil.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Mon Profil";
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
        yield "<div class=\"container-fluid mt-4\">
    <div class='row'>
        ";
        // line 8
        yield from $this->loadTemplate("admin/include/adminMenu.twig", "user/myprofil.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "
        <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-user me-2\"></i> Mon Profil</h1>
                <div class=\"d-inline-block rounded-circle overflow-hidden shadow\" style=\"width: 80px; height: 80px;\">
                    <img src=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["base_url"] ?? null), "html", null, true);
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "PROFILE_PICTURE", [], "any", false, false, false, 15)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "PROFILE_PICTURE", [], "any", false, false, false, 15)), "html", null, true);
        } else {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('asset')->getCallable()("/images/avatars/noimage.jpg"), "html", null, true);
        }
        yield "\" class=\"img-fluid\" alt=\"Avatar de ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "USERNAME", [], "any", false, false, false, 15), "html", null, true);
        yield "\" style=\"width: 100%; height: 100%; object-fit: cover;\" />
                </div>
            </div>


            <div class=\"container mt-5\">
                <form method=\"POST\" enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate>
                    <!-- Informations personnelles -->
                    <div class=\"card mb-4 shadow\">
                        <div class=\"card-header bg-success text-white\">
                            <h5 class=\"mb-0\"><i class=\"fas fa-id-card\"></i> Informations personnelles</h5>
                        </div>

                        <div class=\"card-body\">
                            <div class=\"row g-3\">
                                <input type='text' name='USERS_ID' value='";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "ID", [], "any", false, false, false, 30), "html", null, true);
        yield "' readonly hidden />
                                <div class=\"col-md-6\">
                                    <label for=\"FIRST_NAME\" class=\"form-label\"><i class=\"fas fa-user\"></i> Prénom</label>
                                    <input type=\"text\" id=\"FIRST_NAME\" name=\"FIRST_NAME\" class=\"form-control\" value=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "FIRST_NAME", [], "any", false, false, false, 33), "html", null, true);
        yield "\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"LAST_NAME\" class=\"form-label\"><i class=\"fas fa-user\"></i> Nom</label>
                                    <input type=\"text\" id=\"LAST_NAME\" name=\"LAST_NAME\" class=\"form-control\" value=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "LAST_NAME", [], "any", false, false, false, 37), "html", null, true);
        yield "\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"EMAIL\" class=\"form-label\"><i class=\"fas fa-envelope\"></i> Email</label>
                                    <input type=\"email\" id=\"EMAIL\" name=\"EMAIL\" class=\"form-control\" value=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "EMAIL", [], "any", false, false, false, 41), "html", null, true);
        yield "\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"PHONE_NUMBER\" class=\"form-label\"><i class=\"fas fa-phone\"></i> Numéro de téléphone</label>
                                    <input type=\"text\" id=\"PHONE_NUMBER\" name=\"PHONE_NUMBER\" class=\"form-control\" value=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "PHONE_NUMBER", [], "any", false, false, false, 45), "html", null, true);
        yield "\">
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"BIRTHDAY\" class=\"form-label\"><i class=\"fas fa-birthday-cake\"></i> Date de naissance</label>
                                    <input type=\"date\" id=\"BIRTHDAY\" name=\"BIRTHDAY\" class=\"form-control\" value=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "BIRTHDAY", [], "any", false, false, false, 49), "html", null, true);
        yield "\">
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"GENDER\" class=\"form-label\"><i class=\"fas fa-venus-mars\"></i> Genre</label>
                                    <select id=\"GENDER\" name=\"GENDER\" class=\"form-select\">
                                        <option value=\"\" ";
        // line 54
        if ( !CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "GENDER", [], "any", false, false, false, 54)) {
            yield "selected";
        }
        yield ">Sélectionnez</option>
                                        <option value=\"male\" ";
        // line 55
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "GENDER", [], "any", false, false, false, 55) == "male")) {
            yield "selected";
        }
        yield ">Homme</option>
                                        <option value=\"female\" ";
        // line 56
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "GENDER", [], "any", false, false, false, 56) == "female")) {
            yield "selected";
        }
        yield ">Femme</option>
                                        <option value=\"other\" ";
        // line 57
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "GENDER", [], "any", false, false, false, 57) == "other")) {
            yield "selected";
        }
        yield ">Autre</option>
                                        <option value=\"prefer_not_to_say\" ";
        // line 58
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "GENDER", [], "any", false, false, false, 58) == "prefer_not_to_say")) {
            yield "selected";
        }
        yield ">Préfère ne pas dire</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations complémentaires -->
                    <div class=\"card mb-4 shadow\">
                        <div class=\"card-header bg-info text-white\">
                            <h5 class=\"mb-0\"><i class=\"fas fa-info-circle\"></i> Informations complémentaires</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"mb-3\">
                                <label for=\"ADDRESS\" class=\"form-label\"><i class=\"fas fa-map-marker-alt\"></i> Adresse</label>
                                <textarea id=\"ADDRESS\" name=\"ADDRESS\" class=\"form-control\">";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "ADDRESS", [], "any", false, false, false, 73), "html", null, true);
        yield "</textarea>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"ABOUT_ME\" class=\"form-label\"><i class=\"fas fa-quote-left\"></i> À propos de moi</label>
                                <textarea id=\"ABOUT_ME\" name=\"ABOUT_ME\" class=\"form-control\" rows='10'>";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "ABOUT_ME", [], "any", false, false, false, 77), "html", null, true);
        yield "</textarea>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"PROFILE_PICTURE\" class=\"form-label\"><i class=\"fas fa-image\"></i> Photo de profil</label>
                                <input type=\"file\" id=\"PROFILE_PICTURE\" name=\"PROFILE_PICTURE\" class=\"form-control\">
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class=\"d-flex justify-content-between\">
                        <button type=\"reset\" class=\"btn bg-warning btn-outline-secondary\"><i class=\"fas fa-undo\"></i> Réinitialiser</button>
                        <button type=\"submit\" class=\"btn btn-primary\" style=\"background-color:";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("SITE.site_color_1.value"), "html", null, true);
        yield ";\"><i class=\"fas fa-save\"></i> Enregistrer</button>
                    </div>
                </form>
            </div>

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
        return "user/myprofil.twig";
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
        return array (  217 => 89,  202 => 77,  195 => 73,  175 => 58,  169 => 57,  163 => 56,  157 => 55,  151 => 54,  143 => 49,  136 => 45,  129 => 41,  122 => 37,  115 => 33,  109 => 30,  84 => 15,  76 => 9,  74 => 8,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Mon Profil{% endblock %}

{% block content %}
<div class=\"container-fluid mt-4\">
    <div class='row'>
        {% include 'admin/include/adminMenu.twig' %}

        <main class=\"col-md-10 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Header Section -->
            <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
                <h1 class=\"text-center mb-4\"><i class=\"fas fa-user me-2\"></i> Mon Profil</h1>
                <div class=\"d-inline-block rounded-circle overflow-hidden shadow\" style=\"width: 80px; height: 80px;\">
                    <img src=\"{{ base_url }}{% if profile.PROFILE_PICTURE %}{{ asset(profile.PROFILE_PICTURE) }}{% else %}{{ asset('/images/avatars/noimage.jpg') }}{% endif %}\" class=\"img-fluid\" alt=\"Avatar de {{ user.USERNAME }}\" style=\"width: 100%; height: 100%; object-fit: cover;\" />
                </div>
            </div>


            <div class=\"container mt-5\">
                <form method=\"POST\" enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate>
                    <!-- Informations personnelles -->
                    <div class=\"card mb-4 shadow\">
                        <div class=\"card-header bg-success text-white\">
                            <h5 class=\"mb-0\"><i class=\"fas fa-id-card\"></i> Informations personnelles</h5>
                        </div>

                        <div class=\"card-body\">
                            <div class=\"row g-3\">
                                <input type='text' name='USERS_ID' value='{{user.ID}}' readonly hidden />
                                <div class=\"col-md-6\">
                                    <label for=\"FIRST_NAME\" class=\"form-label\"><i class=\"fas fa-user\"></i> Prénom</label>
                                    <input type=\"text\" id=\"FIRST_NAME\" name=\"FIRST_NAME\" class=\"form-control\" value=\"{{ profile.FIRST_NAME }}\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"LAST_NAME\" class=\"form-label\"><i class=\"fas fa-user\"></i> Nom</label>
                                    <input type=\"text\" id=\"LAST_NAME\" name=\"LAST_NAME\" class=\"form-control\" value=\"{{ profile.LAST_NAME }}\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"EMAIL\" class=\"form-label\"><i class=\"fas fa-envelope\"></i> Email</label>
                                    <input type=\"email\" id=\"EMAIL\" name=\"EMAIL\" class=\"form-control\" value=\"{{ profile.EMAIL }}\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"PHONE_NUMBER\" class=\"form-label\"><i class=\"fas fa-phone\"></i> Numéro de téléphone</label>
                                    <input type=\"text\" id=\"PHONE_NUMBER\" name=\"PHONE_NUMBER\" class=\"form-control\" value=\"{{ profile.PHONE_NUMBER }}\">
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"BIRTHDAY\" class=\"form-label\"><i class=\"fas fa-birthday-cake\"></i> Date de naissance</label>
                                    <input type=\"date\" id=\"BIRTHDAY\" name=\"BIRTHDAY\" class=\"form-control\" value=\"{{ profile.BIRTHDAY }}\">
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"GENDER\" class=\"form-label\"><i class=\"fas fa-venus-mars\"></i> Genre</label>
                                    <select id=\"GENDER\" name=\"GENDER\" class=\"form-select\">
                                        <option value=\"\" {% if not profile.GENDER %}selected{% endif %}>Sélectionnez</option>
                                        <option value=\"male\" {% if profile.GENDER == 'male' %}selected{% endif %}>Homme</option>
                                        <option value=\"female\" {% if profile.GENDER == 'female' %}selected{% endif %}>Femme</option>
                                        <option value=\"other\" {% if profile.GENDER == 'other' %}selected{% endif %}>Autre</option>
                                        <option value=\"prefer_not_to_say\" {% if profile.GENDER == 'prefer_not_to_say' %}selected{% endif %}>Préfère ne pas dire</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations complémentaires -->
                    <div class=\"card mb-4 shadow\">
                        <div class=\"card-header bg-info text-white\">
                            <h5 class=\"mb-0\"><i class=\"fas fa-info-circle\"></i> Informations complémentaires</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"mb-3\">
                                <label for=\"ADDRESS\" class=\"form-label\"><i class=\"fas fa-map-marker-alt\"></i> Adresse</label>
                                <textarea id=\"ADDRESS\" name=\"ADDRESS\" class=\"form-control\">{{ profile.ADDRESS }}</textarea>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"ABOUT_ME\" class=\"form-label\"><i class=\"fas fa-quote-left\"></i> À propos de moi</label>
                                <textarea id=\"ABOUT_ME\" name=\"ABOUT_ME\" class=\"form-control\" rows='10'>{{ profile.ABOUT_ME }}</textarea>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"PROFILE_PICTURE\" class=\"form-label\"><i class=\"fas fa-image\"></i> Photo de profil</label>
                                <input type=\"file\" id=\"PROFILE_PICTURE\" name=\"PROFILE_PICTURE\" class=\"form-control\">
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class=\"d-flex justify-content-between\">
                        <button type=\"reset\" class=\"btn bg-warning btn-outline-secondary\"><i class=\"fas fa-undo\"></i> Réinitialiser</button>
                        <button type=\"submit\" class=\"btn btn-primary\" style=\"background-color:{{ config('SITE.site_color_1.value') }};\"><i class=\"fas fa-save\"></i> Enregistrer</button>
                    </div>
                </form>
            </div>

        </main>

    </div>
</div>
{% endblock %}
", "user/myprofil.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\user\\myprofil.twig");
    }
}
