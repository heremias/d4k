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

/* @bootstrap_storybook/image/image.twig */
class __TwigTemplate_a0a6b1fdbad88dbf1ed17c04b0f3a89e572fb5567e4c6a42d910e3d3d3456a75 extends \Twig\Template
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
        // line 12
        $context["classes"] = twig_array_merge([0 => ((        // line 13
($context["responsive"] ?? null)) ? ("img-fluid") : ("img-thumbnail")), 1 => (((        // line 14
($context["align"] ?? null) == "left")) ? ("float-left") : ("")), 2 => (((        // line 15
($context["align"] ?? null) == "right")) ? ("float-right") : ("")), 3 => (((        // line 16
($context["align"] ?? null) == "center")) ? ("mx-auto d-block") : (""))], ((        // line 17
($context["utility_classes"] ?? null)) ? (($context["utility_classes"] ?? null)) : ([])));
        // line 18
        echo "
<img";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 19, $this->source), "alt"), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 19), 19, $this->source), "html", null, true);
        echo " src=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 19, $this->source), "html", null, true);
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["alt"] ?? null), 19, $this->source), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/image/image.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 19,  46 => 18,  44 => 17,  43 => 16,  42 => 15,  41 => 14,  40 => 13,  39 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/image/image.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/image/image.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 12);
        static $filters = array("merge" => 17, "escape" => 19, "without" => 19);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['merge', 'escape', 'without'],
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
