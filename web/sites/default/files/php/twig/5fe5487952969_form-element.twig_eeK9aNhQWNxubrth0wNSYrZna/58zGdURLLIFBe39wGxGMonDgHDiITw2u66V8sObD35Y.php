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

/* @bootstrap_storybook/form/form-element.twig */
class __TwigTemplate_9ace17b8bb5587e5a90f88fcd127683eef4f186226e67aa9ca70055e445604c8 extends \Twig\Template
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
        // line 50
        $context["classes"] = [0 => "js-form-item", 1 => "form-item", 2 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 53
($context["type"] ?? null), 53, $this->source))), 3 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 54
($context["name"] ?? null), 54, $this->source))), 4 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 55
($context["name"] ?? null), 55, $this->source))), 5 => ((!twig_in_filter(        // line 56
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-no-label") : ("")), 6 => (((        // line 57
($context["disabled"] ?? null) == "disabled")) ? ("form-disabled") : ("")), 7 => ((        // line 58
($context["errors"] ?? null)) ? ("form-item--error") : ("")), 8 => "form-group"];
        // line 63
        $context["description_classes"] = [0 => "description", 1 => "form-text", 2 => "text-muted", 3 => (((        // line 67
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 70
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 70), 70, $this->source), "html", null, true);
        echo ">
  ";
        // line 71
        if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
            // line 72
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 72, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 74
        echo "  ";
        if ( !twig_test_empty(($context["prefix"] ?? null))) {
            // line 75
            echo "    <span class=\"field-prefix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 75, $this->source), "html", null, true);
            echo "</span>
  ";
        }
        // line 77
        echo "  ";
        if (((($context["description_display"] ?? null) == "before") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 77))) {
            // line 78
            echo "    <small";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
            echo ">
      ";
            // line 79
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
            echo "
    </small>
  ";
        }
        // line 82
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 82, $this->source), "html", null, true);
        echo "
  ";
        // line 83
        if ( !twig_test_empty(($context["suffix"] ?? null))) {
            // line 84
            echo "    <span class=\"field-suffix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 84, $this->source), "html", null, true);
            echo "</span>
  ";
        }
        // line 86
        echo "  ";
        if ((($context["label_display"] ?? null) == "after")) {
            // line 87
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 87, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 89
        echo "  ";
        if (($context["errors"] ?? null)) {
            // line 90
            echo "    <div class=\"form-item--error-message\">
      ";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 91, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 94
        echo "  ";
        if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 94))) {
            // line 95
            echo "    <small";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 95), "addClass", [0 => ($context["description_classes"] ?? null)], "method", false, false, true, 95), 95, $this->source), "html", null, true);
            echo ">
      ";
            // line 96
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 96), 96, $this->source), "html", null, true);
            echo "
    </small>
  ";
        }
        // line 99
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/form/form-element.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 99,  128 => 96,  123 => 95,  120 => 94,  114 => 91,  111 => 90,  108 => 89,  102 => 87,  99 => 86,  93 => 84,  91 => 83,  86 => 82,  80 => 79,  75 => 78,  72 => 77,  66 => 75,  63 => 74,  57 => 72,  55 => 71,  50 => 70,  48 => 67,  47 => 63,  45 => 58,  44 => 57,  43 => 56,  42 => 55,  41 => 54,  40 => 53,  39 => 50,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/form/form-element.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/form/form-element.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 50, "if" => 71);
        static $filters = array("clean_class" => 53, "escape" => 70);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
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
