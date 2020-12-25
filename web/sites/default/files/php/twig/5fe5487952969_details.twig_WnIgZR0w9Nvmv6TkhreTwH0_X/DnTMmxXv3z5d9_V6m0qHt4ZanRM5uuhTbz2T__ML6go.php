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

/* @bootstrap_storybook/form/details.twig */
class __TwigTemplate_29982ed59233e91aa7403a8cd15b31c33680f4da1b0b7d9d9322313b909e542a extends \Twig\Template
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
        $context["css_classes"] = [0 => "card", 1 => "mb-3"];
        // line 11
        echo "
<details";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["css_classes"] ?? null)], "method", false, false, true, 12), 12, $this->source), "html", null, true);
        echo ">
  ";
        // line 14
        $context["summary_classes"] = [0 => "card-header", 1 => ((        // line 16
($context["required"] ?? null)) ? ("js-form-required") : ("")), 2 => ((        // line 17
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 20
        if (($context["title"] ?? null)) {
            // line 21
            echo "<summary";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["summary_attributes"] ?? null), "addClass", [0 => ($context["summary_classes"] ?? null)], "method", false, false, true, 21), 21, $this->source), "html", null, true);
            echo ">
      ";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 22, $this->source), "html", null, true);
            echo "
    </summary>";
        }
        // line 26
        if (($context["errors"] ?? null)) {
            // line 27
            echo "    <div>
      ";
            // line 28
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 28, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 31
        echo "
  <div class=\"card-body\">
    ";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 33, $this->source), "html", null, true);
        echo "
    ";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 34, $this->source), "html", null, true);
        echo "
    ";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 35, $this->source), "html", null, true);
        echo "
  </div>
</details>
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/form/details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 35,  83 => 34,  79 => 33,  75 => 31,  69 => 28,  66 => 27,  64 => 26,  59 => 22,  54 => 21,  52 => 20,  50 => 17,  49 => 16,  48 => 14,  44 => 12,  41 => 11,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/form/details.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/form/details.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "if" => 20);
        static $filters = array("escape" => 12);
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
