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

/* @bootstrap_storybook/form/form-element--label.twig */
class __TwigTemplate_e1e51dfc1df5cca60197a683149b364cfd2ae8990ad95386a8958ab098ca9808 extends \Twig\Template
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
        // line 20
        $context["classes"] = [0 => (((        // line 21
($context["title_display"] ?? null) == "after")) ? ("option") : ("")), 1 => (((        // line 22
($context["title_display"] ?? null) == "invisible")) ? ("visually-hidden") : ("")), 2 => ((        // line 23
($context["required"] ?? null)) ? ("js-form-required") : ("")), 3 => ((        // line 24
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 27
        if (( !twig_test_empty(($context["title"] ?? null)) || ($context["required"] ?? null))) {
            // line 28
            echo "<label";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 28), 28, $this->source), "html", null, true);
            echo "> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["element"] ?? null), 28, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 28, $this->source), "html", null, true);
            // line 29
            if (($context["description"] ?? null)) {
                // line 30
                echo "<p class=\"help-block\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 30, $this->source), "html", null, true);
                echo "</p>";
            }
            // line 32
            if ((($context["required"] ?? null) && (($context["title_display"] ?? null) == "before"))) {
                // line 33
                echo "<span class=\"font-weight-bolder form-required pl-1 text-danger\">*</span>";
            }
            // line 35
            echo "</label>";
        }
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/form/form-element--label.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 35,  63 => 33,  61 => 32,  56 => 30,  54 => 29,  47 => 28,  45 => 27,  43 => 24,  42 => 23,  41 => 22,  40 => 21,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/form/form-element--label.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/form/form-element--label.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 20, "if" => 27);
        static $filters = array("escape" => 28);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
