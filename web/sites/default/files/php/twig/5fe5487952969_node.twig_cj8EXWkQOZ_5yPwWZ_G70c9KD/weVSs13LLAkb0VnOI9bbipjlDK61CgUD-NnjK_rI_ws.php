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

/* @boom/node/node.twig */
class __TwigTemplate_60a14c38eefaa0c53c9170fb0436171bf1d46dafad31068c4b999007cb17d9d8 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        $context["classes"] = [0 => "node", 1 => ((twig_get_attribute($this->env, $this->source,         // line 10
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 10)) ? ("node--promoted") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 11
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 11)) ? ("node--sticky") : ("")), 3 => (( !twig_get_attribute($this->env, $this->source,         // line 12
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 12)) ? ("node--unpublished") : ("")), 4 => \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "bundle", [], "any", false, false, true, 13), 13, $this->source)), 5 => ((\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 14
($context["node"] ?? null), "bundle", [], "any", false, false, true, 14), 14, $this->source)) . "--") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 14, $this->source)))];
        // line 17
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 17), 17, $this->source), "html", null, true);
        echo ">
  ";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 18, $this->source), "html", null, true);
        echo "
  ";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 19, $this->source), "html", null, true);
        echo "

  ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "</article>
";
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        echo "    ";
        if ( !($context["page"] ?? null)) {
            // line 23
            echo "      <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 23, $this->source), "html", null, true);
            echo ">
        <a href=\"";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 24, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 24, $this->source), "html", null, true);
            echo "</a>
      </h2>
    ";
        }
        // line 27
        echo "
    ";
        // line 28
        if (($context["display_submitted"] ?? null)) {
            // line 29
            echo "      <footer>
        ";
            // line 30
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 30, $this->source), "html", null, true);
            echo "
        <div";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 31, $this->source), "html", null, true);
            echo ">
          ";
            // line 32
            echo t("Submitted by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 33
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 33, $this->source), "html", null, true);
            echo "
        </div>
      </footer>
    ";
        }
        // line 37
        echo "
    <div";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "content-wrapper"], "method", false, false, true, 38), 38, $this->source), "html", null, true);
        echo ">
      ";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 39, $this->source), "html", null, true);
        echo "
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "@boom/node/node.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 39,  117 => 38,  114 => 37,  106 => 33,  104 => 32,  100 => 31,  96 => 30,  93 => 29,  91 => 28,  88 => 27,  80 => 24,  75 => 23,  72 => 22,  68 => 21,  63 => 42,  61 => 21,  56 => 19,  52 => 18,  47 => 17,  45 => 14,  44 => 13,  43 => 12,  42 => 11,  41 => 10,  40 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/node/node.twig", "/var/www/html/web/themes/custom/boom/src/components/node/node.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 8, "block" => 21, "if" => 22, "trans" => 32);
        static $filters = array("clean_class" => 13, "escape" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if', 'trans'],
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
