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

/* home/contact.twig */
class __TwigTemplate_0f1df1f1e1102fb93cc89f122cbd7ac3 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "home/contact.twig", 1);
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
        yield "<div class=\"container my-5\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <h2>Contactez-nous</h2>
            <p class=\"lead\">Nous serions ravis de répondre à vos questions. Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
            <form action=\"#\" method=\"post\">
                <div class=\"mb-3\">
                    <label for=\"name\" class=\"form-label\">Nom</label>
                    <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Votre nom\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Email</label>
                    <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Votre email\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"message\" class=\"form-label\">Message</label>
                    <textarea class=\"form-control\" id=\"message\" name=\"message\" rows=\"4\" placeholder=\"Votre message\" required></textarea>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
            </form>
        </div>
        <div class=\"col-md-6\">
            ";
        // line 26
        if ((($this->env->getFunction('config')->getCallable()("ADMIN.admin_address.value") || $this->env->getFunction('config')->getCallable()("ADMIN.admin_mail.value")) || $this->env->getFunction('config')->getCallable()("ADMIN.admin_phone.value"))) {
            // line 27
            yield "            <h3>Informations de contact</h3>
            <ul class=\"list-unstyled\">
                ";
            // line 29
            if ($this->env->getFunction('config')->getCallable()("ADMIN.admin_address.value")) {
                // line 30
                yield "                <li class=\"mb-3\">
                    <i class=\"fas fa-map-marker-alt\"></i>
                    <strong>Adresse :</strong> ";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("ADMIN.admin_address.value"), "html", null, true);
                yield "
                </li>
                ";
            }
            // line 35
            yield "                ";
            if ($this->env->getFunction('config')->getCallable()("ADMIN.admin_phone.value")) {
                // line 36
                yield "                <li class=\"mb-3\">
                    <i class=\"fas fa-phone-alt\"></i>
                    <strong>Téléphone :</strong> ";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("ADMIN.admin_phone.value"), "html", null, true);
                yield "
                </li>
                ";
            }
            // line 41
            yield "
                ";
            // line 42
            if ($this->env->getFunction('config')->getCallable()("ADMIN.admin_mail.value")) {
                // line 43
                yield "                <li class=\"mb-3\">
                    <i class=\"fas fa-envelope\"></i>
                    <strong>Email :</strong> <a class=\"link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\" href=\"mailto:";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("ADMIN.admin_mail.value"), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('config')->getCallable()("ADMIN.admin_mail.value"), "html", null, true);
                yield "</a>
                </li>
                ";
            }
            // line 48
            yield "            </ul>
            ";
        }
        // line 50
        yield "        </div>
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
        return "home/contact.twig";
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
        return array (  134 => 50,  130 => 48,  122 => 45,  118 => 43,  116 => 42,  113 => 41,  107 => 38,  103 => 36,  100 => 35,  94 => 32,  90 => 30,  88 => 29,  84 => 27,  82 => 26,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block content %}
<div class=\"container my-5\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <h2>Contactez-nous</h2>
            <p class=\"lead\">Nous serions ravis de répondre à vos questions. Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
            <form action=\"#\" method=\"post\">
                <div class=\"mb-3\">
                    <label for=\"name\" class=\"form-label\">Nom</label>
                    <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Votre nom\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Email</label>
                    <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Votre email\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"message\" class=\"form-label\">Message</label>
                    <textarea class=\"form-control\" id=\"message\" name=\"message\" rows=\"4\" placeholder=\"Votre message\" required></textarea>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
            </form>
        </div>
        <div class=\"col-md-6\">
            {% if config('ADMIN.admin_address.value') or config('ADMIN.admin_mail.value') or config('ADMIN.admin_phone.value') %}
            <h3>Informations de contact</h3>
            <ul class=\"list-unstyled\">
                {% if config('ADMIN.admin_address.value') %}
                <li class=\"mb-3\">
                    <i class=\"fas fa-map-marker-alt\"></i>
                    <strong>Adresse :</strong> {{ config('ADMIN.admin_address.value') }}
                </li>
                {% endif %}
                {% if config('ADMIN.admin_phone.value') %}
                <li class=\"mb-3\">
                    <i class=\"fas fa-phone-alt\"></i>
                    <strong>Téléphone :</strong> {{ config('ADMIN.admin_phone.value') }}
                </li>
                {% endif %}

                {% if config('ADMIN.admin_mail.value') %}
                <li class=\"mb-3\">
                    <i class=\"fas fa-envelope\"></i>
                    <strong>Email :</strong> <a class=\"link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\" href=\"mailto:{{config('ADMIN.admin_mail.value')}}\">{{config('ADMIN.admin_mail.value')}}</a>
                </li>
                {% endif %}
            </ul>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}
", "home/contact.twig", "C:\\wamp64\\www\\MyMVC\\app\\Views\\home\\contact.twig");
    }
}
