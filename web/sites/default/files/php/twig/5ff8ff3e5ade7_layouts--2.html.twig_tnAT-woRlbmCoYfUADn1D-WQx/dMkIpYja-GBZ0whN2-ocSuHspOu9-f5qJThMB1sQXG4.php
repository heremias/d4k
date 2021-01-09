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

/* modules/contrib/dashboards/templates/layouts/layouts--2.html.twig */
class __TwigTemplate_20ed6aa7aaa63130a9925aac28ad4f723a47cbc1b2f020873691d3391e2a7511 extends \Twig\Template
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
        // line 1
        echo "<section ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "layouts-dashboards-2", 1 => "layouts-dashboards"], "method", false, false, true, 1), 1, $this->source), "html", null, true);
        echo ">
";
        // line 2
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "one", [], "any", false, false, true, 2)) {
            // line 3
            echo "  <div class=\"drow\">
    <div ";
            // line 4
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "one", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            echo ">
      ";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "one", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "
    </div>
  </div>
  ";
        }
        // line 9
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "two", [], "any", false, false, true, 9)) {
            // line 10
            echo "  <div class=\"drow\">
    <div ";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "two", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo ">
      ";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "two", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "
    </div>
  </div>
  ";
        }
        // line 16
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "three", [], "any", false, false, true, 16)) {
            // line 17
            echo "  <div class=\"drow\">
    <div ";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "three", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            echo ">
      ";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "three", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "
    </div>
  </div>
  ";
        }
        // line 23
        echo "</section>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/dashboards/templates/layouts/layouts--2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 23,  87 => 19,  83 => 18,  80 => 17,  77 => 16,  70 => 12,  66 => 11,  63 => 10,  60 => 9,  53 => 5,  49 => 4,  46 => 3,  44 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/dashboards/templates/layouts/layouts--2.html.twig", "/var/www/html/web/modules/contrib/dashboards/templates/layouts/layouts--2.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
