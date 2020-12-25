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

/* @bootstrap_storybook/views/views-view.twig */
class __TwigTemplate_e368d2f65184869f2b62bb0986a051e6f013fa31c6b43810a8c664ea21d6043f extends \Twig\Template
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
        // line 34
        $context["classes"] = [0 => ((        // line 35
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 35, $this->source))) : ("")), 1 => ((        // line 36
($context["css_name"] ?? null)) ? (("view-" . $this->sandbox->ensureToStringAllowed(($context["css_name"] ?? null), 36, $this->source))) : (""))];
        // line 39
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 39), 39, $this->source), "html", null, true);
        echo ">
  ";
        // line 40
        $this->loadTemplate("@bootstrap_storybook/title/title.twig", "@bootstrap_storybook/views/views-view.twig", 40)->display($context);
        // line 41
        echo "
  ";
        // line 42
        if (($context["header"] ?? null)) {
            // line 43
            echo "    <div class=\"view-header\">
      ";
            // line 44
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 44, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 47
        echo "  ";
        if (($context["exposed"] ?? null)) {
            // line 48
            echo "    <div class=\"view-filters\">
      ";
            // line 49
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 49, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 52
        echo "  ";
        if (($context["attachment_before"] ?? null)) {
            // line 53
            echo "    <div class=\"attachment attachment-before\">
      ";
            // line 54
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 54, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 57
        echo "
  ";
        // line 58
        if (($context["rows"] ?? null)) {
            // line 59
            echo "    <div class=\"view-content\">
      ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 60, $this->source), "html", null, true);
            echo "
    </div>
  ";
        } elseif (        // line 62
($context["empty"] ?? null)) {
            // line 63
            echo "    <div class=\"view-empty\">
      ";
            // line 64
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 64, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 67
        echo "
  ";
        // line 68
        if (($context["pager"] ?? null)) {
            // line 69
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 69, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 71
        echo "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 72
            echo "    <div class=\"attachment attachment-after\">
      ";
            // line 73
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 73, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 76
        echo "  ";
        if (($context["more"] ?? null)) {
            // line 77
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 77, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 79
        echo "  ";
        if (($context["footer"] ?? null)) {
            // line 80
            echo "    <div class=\"view-footer\">
      ";
            // line 81
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 81, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 84
        echo "  ";
        if (($context["feed_icons"] ?? null)) {
            // line 85
            echo "    <div class=\"feed-icons\">
      ";
            // line 86
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 86, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 89
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/views/views-view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 89,  162 => 86,  159 => 85,  156 => 84,  150 => 81,  147 => 80,  144 => 79,  138 => 77,  135 => 76,  129 => 73,  126 => 72,  123 => 71,  117 => 69,  115 => 68,  112 => 67,  106 => 64,  103 => 63,  101 => 62,  96 => 60,  93 => 59,  91 => 58,  88 => 57,  82 => 54,  79 => 53,  76 => 52,  70 => 49,  67 => 48,  64 => 47,  58 => 44,  55 => 43,  53 => 42,  50 => 41,  48 => 40,  43 => 39,  41 => 36,  40 => 35,  39 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/views/views-view.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/views/views-view.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "include" => 40, "if" => 42);
        static $filters = array("escape" => 39);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'include', 'if'],
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
