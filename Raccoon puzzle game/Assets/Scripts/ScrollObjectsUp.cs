using UnityEngine;
using System.Collections;

public class ScrollObjectsUp : MonoBehaviour {


    public float speedOfScrollingButtons = 5f;
    public float checkPositionOfButton = 0f;
    private RectTransform rectTransform;

    private void Awake()
    {
        rectTransform = GetComponent<RectTransform>();

    }

    private void Update()
    {
        if (rectTransform.offsetMin.y != checkPositionOfButton )
        {
            rectTransform.offsetMin += new Vector2(rectTransform.offsetMin.x, speedOfScrollingButtons);
            rectTransform.offsetMax += new Vector2(rectTransform.offsetMax.x, speedOfScrollingButtons);
        }
        
    }

}
