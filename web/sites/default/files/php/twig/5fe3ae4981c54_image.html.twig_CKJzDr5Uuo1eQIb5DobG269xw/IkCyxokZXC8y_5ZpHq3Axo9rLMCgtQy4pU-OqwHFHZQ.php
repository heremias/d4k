<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/boom/templates/field/image.html.twig */
class __TwigTemplate_922461f3b67ddc31f702790fbe537806c2735410a854a28e89e74cf78ea1817c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        $this->loadTemplate("@bootstrap_storybook/image/image.twig", "themes/custom/boom/templates/field/image.html.twig", 7)->display(twig_array_merge($context, ["src" => twig_get_attribute($this->env, $this->source,         // line 8
($context["attributes"] ?? null), "src", [], "any", false, false, true, 8), "alt" => twig_get_attribute($this->env, $this->source,         // line 9
($context["attributes"] ?? null), "alt", [], "any", false, false, true, 9), "responsive" => true]));
    }

    public function getTemplateName()
    {
        return "themes/custom/boom/templates/field/image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  40 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/boom/templates/field/image.html.twig", "/var/www/html/web/themes/custom/boom/templates/field/image.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 7);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
