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

/* @boom/title/title.twig */
class __TwigTemplate_ce5967d00aad86a4c59820bd665cff9d3b126a13ef06150ed174d895677f489c extends \Twig\Template
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
        $context["titleTag"] = (($context["titleTag"]) ?? ("h1"));
        // line 8
        echo "
";
        // line 9
        $context["titleClasses"] = twig_array_merge([0 => "page-title", 1 => ((        // line 11
($context["displaySize"] ?? null)) ? (("display--" . $this->sandbox->ensureToStringAllowed(($context["displaySize"] ?? null), 11, $this->source))) : (""))], ((        // line 12
($context["title_utility_classes"] ?? null)) ? (($context["title_utility_classes"] ?? null)) : ([])));
        // line 13
        echo "
";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 14, $this->source), "html", null, true);
        echo "
";
        // line 15
        if (($context["title"] ?? null)) {
            // line 16
            echo "  <";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["titleTag"] ?? null), 16, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($context["titleClasses"] ?? null)], "method", false, false, true, 16), 16, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 16, $this->source), "html", null, true);
            echo "</";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["titleTag"] ?? null), 16, $this->source), "html", null, true);
            echo ">
";
        }
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 18, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@boom/title/title.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  57 => 16,  55 => 15,  51 => 14,  48 => 13,  46 => 12,  45 => 11,  44 => 9,  41 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/title/title.twig", "/var/www/html/web/themes/custom/boom/src/components/title/title.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "if" => 15);
        static $filters = array("merge" => 12, "escape" => 14);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['merge', 'escape'],
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
