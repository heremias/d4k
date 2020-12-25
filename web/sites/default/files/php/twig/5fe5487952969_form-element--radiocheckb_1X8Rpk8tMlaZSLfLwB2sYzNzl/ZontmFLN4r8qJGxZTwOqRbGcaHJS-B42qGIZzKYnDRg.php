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

/* @bootstrap_storybook/form/form-element--radiocheckbox.twig */
class __TwigTemplate_ef6e74dcca6aaa909c8d7f266144c3dd932aeba37dc1b17f0076da8c79554926 extends \Twig\Template
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
        // line 10
        $context["classes"] = [0 => "js-form-item", 1 => "form-item", 2 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 13
($context["type"] ?? null), 13, $this->source))), 3 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 14
($context["name"] ?? null), 14, $this->source))), 4 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 15
($context["name"] ?? null), 15, $this->source))), 5 => ((!twig_in_filter(        // line 16
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-no-label") : ("")), 6 => (((        // line 17
($context["disabled"] ?? null) == "disabled")) ? ("form-disabled") : ("")), 7 => ((        // line 18
($context["errors"] ?? null)) ? ("form-item--error") : ("")), 8 => "form-check"];
        // line 23
        $context["description_classes"] = [0 => "description", 1 => "form-text", 2 => "text-muted", 3 => (((        // line 27
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 30
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 30), 30, $this->source), "html", null, true);
        echo ">
  ";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 31, $this->source), "html", null, true);
        echo "

  ";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 33, $this->source), "html", null, true);
        echo "

  ";
        // line 35
        if (($context["errors"] ?? null)) {
            // line 36
            echo "    <div class=\"form-item--error-message\">
      ";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 37, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 40
        echo "
  ";
        // line 41
        if (twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 41)) {
            // line 42
            echo "    <small";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 42), "addClass", [0 => ($context["description_classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
            echo ">
      ";
            // line 43
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
            echo "
    </small>
  ";
        }
        // line 46
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/form/form-element--radiocheckbox.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 46,  86 => 43,  81 => 42,  79 => 41,  76 => 40,  70 => 37,  67 => 36,  65 => 35,  60 => 33,  55 => 31,  50 => 30,  48 => 27,  47 => 23,  45 => 18,  44 => 17,  43 => 16,  42 => 15,  41 => 14,  40 => 13,  39 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/form/form-element--radiocheckbox.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/form/form-element--radiocheckbox.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 10, "if" => 35);
        static $filters = array("clean_class" => 13, "escape" => 30);
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
