using UnityEngine;
using System.Collections;

public class PopUpOptionsWindows : MonoBehaviour {

    public static PopUpOptionsWindows instance;

    public float speedOfScrollingButtons = -15f;
    
    private RectTransform rectTransform;
    
    public GameObject options_off;
    public GameObject options_on;
    


    private void Awake()
    {
        
        instance = this;
        rectTransform = GetComponent<RectTransform>();

    }

    void Update()
    {
        
    }
    public void ShowPopUpWindow()
    {
        rectTransform.anchorMin = new Vector2(0.3f, 0.3f);
        rectTransform.anchorMax = new Vector2(0.7f, 0.7f);
        speedOfScrollingButtons = 0f;
        rectTransform.offsetMin += new Vector2(rectTransform.offsetMin.x, speedOfScrollingButtons);
        rectTransform.offsetMax += new Vector2(rectTransform.offsetMax.x, speedOfScrollingButtons);
        options_off.SetActive(true);
        options_on.SetActive(false);
        
    }
    public void HidePopUpWindow()
    {
        
        
        rectTransform.anchorMin = new Vector2(0.3f, 1f);
        rectTransform.anchorMax = new Vector2(0.7f, 1f);
        rectTransform.offsetMin += new Vector2(rectTransform.offsetMin.x, speedOfScrollingButtons);
        rectTransform.offsetMax += new Vector2(rectTransform.offsetMax.x, speedOfScrollingButtons);
        options_off.SetActive(false);
        options_on.SetActive(true);
    }
  

}
